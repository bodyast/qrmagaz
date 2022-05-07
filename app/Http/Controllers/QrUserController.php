<?php

namespace App\Http\Controllers;


use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Qr;
use App\Models\Newclient;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

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

        $ip = $request->ip();
        $time = strtotime($date);
        $time = $time - 43200;
        $datetu = date("Y-m-d H:i:s", $time);

        $client = Newclient::where('user_id', '=', $user_id)->where('ip', '=', $ip)->where('date', '>', $datetu)->first();
        if(!$client){
            Newclient::create(['user_id'=>$user_id, 'table_id'=> $table->id,'ip'=> $ip , 'date' => $date]);
        }

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

    public function product($key, $id, Request $request){

        $product = Product::where('id', '=', $id)->first();

        $table = QR::where('key', '=', $key)->where('user_id', '=', $product->user_id)->first();

        $order = Order::where('user_id', '=', $table->user_id)->where('table_id', '=', $table->id)->get();

        $a = 0;
        foreach ($order as $orders){
            $products = Product::where('id', '=', $orders->product_id)->first();
            $order[$a]->name = $products->name;
            $order[$a]->img = $products->img;
            $order[$a]->img = $products->img;
            $order[$a]->price = $products->price * $orders->quantity;
            $a++;
        }

        return view('client.product',[
            'product'=>$product,
            'key'=>$key,
            'table'=> $table,
            'order'=>$order
            ]);

    }
    public function productAdd($user_id, $key, $id, Request $request){


        if($request->get('quantity')){
            $quantity = ( int )$request->get('quantity');
        }else{
            $quantity = 1;
        }

        $date = date("Y-m-d H:i:s");

        $product = Product::where('id', '=', $id)->first();

        $table = QR::where('key', '=', $key)->where('user_id', '=', $user_id)->first();

        Order::create(['user_id'=>$user_id, 'table_id'=> $table->id,'product_id'=> $product->id , 'quantity' => $quantity, 'created_at'=> $date, 'status_order' => 'вибрано']);

        $order = Order::where('user_id', '=', $user_id)->where('table_id', '=', $table->id)->get();

        $a = 0;
        foreach ($order as $orders){
            $products = Product::where('id', '=', $orders->product_id)->first();
            $order[$a]->name = $products->name;
            $order[$a]->img = $products->img;
            $order[$a]->img = $products->img;
            $order[$a]->price = $products->price * $orders->quantity;
            $a++;
        }


        $template = view('client.new_menu_add',
            [
                'order' => $order
            ]
        )->render();

        return response()->json(array('html'=> $template), 200);

    }


}
