<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Qr;
use App\Models\Newclient;
use App\Models\Category;
use App\Models\Product;

class QrUserController extends Controller
{
    public function __construct()
    {
//        $this->middleware('auth');
    }

    public function newclient ($key, $user_id, Request $request)
    {


        $table = Qr::where('user_id', '=', $user_id)->where('key', '=', $key)->first();

        $date = date("Y-m-d H:i:s");

        Newclient::create(['user_id'=>$user_id, 'table_id'=> $table->id, 'date' => $date]);

        $category = Category::where('user_id', '=', $user_id)->get();


        return view('client.menu', ['category'=> $category, 'table'=>$table, 'key' => $key, 'user_id' => $user_id]);
    }

    public function getProducts($key, Request $request){

        $cat_id = $request->get('cat_id');

        $product = Product::where('cat_id', '=', $cat_id)->get();

        $template = view('client.list_prod',
            [
                'lists' => $product,
                'key' => $key,
            ]
        )->render();

        return response()->json(array('html'=> $template), 200);

    }

    public function product($key, Request $request){



        return view('client.product');

    }


}
