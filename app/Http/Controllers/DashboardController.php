<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\File;
use App\Models\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Models\Qr;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard.index');
    }

    public function myqrcode()
    {

        $list = Qr::where('user_id', '=', Auth::user()->id)->get();

        $a = 0;
        foreach ($list as $lists){
            $list[$a]->qr = htmlspecialchars_decode($lists->qr);
            $a++;
        }

        return view('dashboard.myqrcode', ['list'=>$list]);
    }

    public function mymenu()
    {
        $list = Category::where('user_id', '=', Auth::user()->id)->get();
        $a = 0;
        foreach ($list as $lists){
            $menu = Product::where('cat_id', '=', $lists->id)->get();
            $list[$a]->menu = $menu;
            $a++;
        }

        return view('dashboard.mymenu', ['list'=>$list]);
    }

    public function newcategory(Request $request)
    {
        if($request->get('name')){
            $name = $request->get('name');
        }else{
            $name = '';
        }

        if($request->get('description')){
            $description = $request->get('description');
        }else{
            $description = '';
        }

        Category::create(['user_id'=> Auth::user()->id, 'name'=> $name, 'description'=> $description, 'img'=>'img']);

        $cat = Category::where('user_id', '=', Auth::user()->id)->get();

        $a = 0;
        foreach ($cat as $lists){
            $menu = Product::where('cat_id', '=', $lists->id)->get();
            $cat[$a]->menu = $menu;
            $a++;
        }

        $template = view('dashboard.list_mymenu',
            [
                'list' => $cat,
            ]
        )->render();

        return response()->json(array('html'=> $template), 200);
    }

    public function delcategory(Request $request)
    {

        $id = $request->get('ids');


        $api = Category::where('id', '=', $id)->first();
        $api->delete();

        $cat = Category::where('user_id', '=', Auth::user()->id)->get();

        $a = 0;
        foreach ($cat as $lists){
            $menu = Product::where('cat_id', '=', $lists->id)->get();
            $cat[$a]->menu = $menu;
            $a++;
        }

        $template = view('dashboard.list_mymenu',
            [
                'list' => $cat,
            ]
        )->render();

        return response()->json(array('html'=> $template), 200);
    }
    public function addcatmodal(Request $request){

        $id = $request->get('ids');

        $api = Category::where('id', '=', $id)->first();

        $template = view('dashboard.addmodal_cat',
            [
                'category_id' => $id,
                'category' => $api
            ]
        )->render();

        return response()->json(array('html'=> $template), 200);
    }

    public function addproduct(Request $request)
    {

        $id = $request->get('ids');

        $template = view('dashboard.addmodal_product',
            [
                'category_id' => $id,
                'product' => false,
            ]
        )->render();

        return response()->json(array('html'=> $template), 200);
    }

    public function addproductmodal(Request $request)
    {

        if($request->file('file')){
            $uploadedFile = $request->file('file');
            $filename = time().$uploadedFile->getClientOriginalName();

            Storage::disk('local')->putFileAs(
                'files/menu/'.Auth::user()->id,
                $uploadedFile,
                $filename
            );

            $upload = new Upload;
            $upload->filename = $filename;

            $upload->user()->associate(auth()->user());

            $upload->save();
        }else{
            $filename = '';
        }

        if($request->get('prod_id')){
            $id = $request->get('prod_id');
            if($request->get('name_product')){
                $name = $request->get('name_product');
            }else{
                $name ='';
            }
            if($request->get('desc_product')){
                $description = $request->get('desc_product');
            }else{
                $description ='';
            }

            if($request->get('mass_product')){
                $mass = $request->get('mass_product');
            }else{
                $mass ='';
            }

            if($request->get('price_product')){
                $price = $request->get('price_product');
            }else{
                $price ='';
            }

            if($filename ==''){

            }
            $api = Product::where('id', '=', $id)->first();
            $api->name = $name;
            $api->description = $description;
            $api->mass = $mass;
            $api->price = $price;
            if($filename == ''){
                $api->img = $api->img;
            }else{
                $api->img = $filename;
            }
            $api->save();

        }else{
            Product::create([
                'user_id'=> Auth::user()->id,
                'cat_id'=> $request->get('cat_id'),
                'name'=> $request->get('name_product'),
                'description'=> $request->get('desc_product'),
                'mass'=> $request->get('mass_product'),
                'price'=> $request->get('price_product'),
                'img'=> $filename,
            ]);
        }

        return redirect()->back()->with('name_product', 10);

    }

    public function editprod(Request $request){

        $id = $request->get('ids');

        $product =  Product::where('id', '=', $id)->first();

        $template = view('dashboard.addmodal_product',
            [
                'category_id' => $id,
                'product' => $product,
            ]
        )->render();

        return response()->json(array('html'=> $template), 200);
    }

    public function redycatmodal(Request $request){

        if($request->file('file')){
            $uploadedFile = $request->file('file');
            $filename = time().$uploadedFile->getClientOriginalName();

            Storage::disk('local')->putFileAs(
                'files/menu/'.Auth::user()->id,
                $uploadedFile,
                $filename
            );

            $upload = new Upload;
            $upload->filename = $filename;

            $upload->user()->associate(auth()->user());

            $upload->save();
        }else{
            $filename = '';
        }
        if($request->get('name_product')){
            $name = $request->get('name_product');
        }else{
            $name ='';
        }

        if($request->get('desc_product')){
            $description = $request->get('desc_product');
        }else{
            $description ='';
        }


        $id = $request->get('cat_id');

        $api = Category::where('id', '=', $id)->first();
        $api->name = $name;
        $api->description = $description;
        if($filename ==''){
            $api->img = $api->img;
        }else{
            $api->img = $filename;
        }
        $api->save();

        return redirect()->back()->with('name_product', 10);
    }

    public function delprods(Request $request){

        $id = $request->get('ids');

        $product =  Product::where('id', '=', $id)->first();

        $template = view('dashboard.modal_delprods',
            [
                'product' => $id,
                'products' => $product
            ]
        )->render();

        return response()->json(array('html'=> $template), 200);
    }
    public function delproduct(Request $request){

        $id = $request->get('ids');

        $product =  Product::where('id', '=', $id)->first();
        $idcat = $product->cat_id;
        $product->delete();

        $cat = Category::where('id', '=', $idcat)->get();

        $a = 0;
        foreach ($cat as $lists){
            $menu = Product::where('cat_id', '=', $lists->id)->get();
            $cat[$a]->menu = $menu;
            $a++;
        }

        $template = view('dashboard.id_list_menu',
            [
                'list' => $cat,
            ]
        )->render();

        return response()->json(array('html'=> $template, 'cat_id'=>$idcat), 200);
    }


}
