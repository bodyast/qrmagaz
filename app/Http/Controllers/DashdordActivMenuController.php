<?php

namespace App\Http\Controllers;

use App\Models\Newclient;
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


class DashdordActivMenuController extends Controller
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
        $listclient = Newclient::where('user_id', '=', Auth::user()->id)->get();

        return view('dashboard.myactivemenu',['listclient'=> $listclient]);
    }

    public function getlist(Request $request)
    {
        $listclient = Newclient::where('user_id', '=', Auth::user()->id)->get();

        $template = view('dashboard.listactivemenu',
            [
                'listclient' => $listclient,
            ]
        )->render();

        return response()->json(array('html'=> $template, 'client'=>$listclient), 200);
    }


}
