<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Qr;

class SimpleQRcodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function generate (Request $request) {

        if($request->get('name')){
            $name = $request->get('name');
        } else{
            $name = '';
        }

        File::makeDirectory('../public/codes-qr/'.Auth::user()->id, $mode = 0777, true, true);
        $dir = opendir('../public/codes-qr/'.Auth::user()->id);
        $count = 0;
        while($file = readdir($dir)){
            if($file == '.' || $file == '..' || is_dir('path/to/dir' . $file)){
                continue;
            }
            $count++;
        }
        $count = $count+1;
        $key = str_random(8);
        $img = 'codes-qr/'.Auth::user()->id.'/'.$count.'.svg';
        $link = "http://qrmagaz.ua/".$key."-".Auth::user()->id."/menu";
        $qrs = Qr::create(['name'=>$name, 'user_id'=> Auth::user()->id,'qr' => $img, 'link'=> $link, 'key'=>$key]);

        $qrcode = Qrcode::size(300)->generate("http://qrmagaz.ua/".$key."-".Auth::user()->id."/menu", '../public/codes-qr/'.Auth::user()->id.'/'.$qrs->id.'.svg');

        $api = Qr::where('id', '=', $qrs->id)->first();
        $api->qr = 'codes-qr/'.Auth::user()->id.'/'.$qrs->id.'.svg';
        $api->save();

        $imgs = Qr::where('user_id', '=', Auth::user()->id)->get();

        $template = view('dashboard.qrlist',
            [
                'list' => $imgs,
            ]
        )->render();

        return response()->json(array('html'=> $template), 200);
    }

    public function delete(Request $request){

        $id = $request->get('ids');

        $api = Qr::where('id', '=', $id)->first();
        $url = $api->qr;
        $api->delete();

        unlink(public_path($url));

        $imgs = Qr::where('user_id', '=', Auth::user()->id)->get();
        $template = view('dashboard.qrlist',
            [
                'list' => $imgs,
            ]
        )->render();

        return response()->json(array('html'=> $template), 200);
    }
}
