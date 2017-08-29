<?php

namespace App\Http\Controllers;

use App\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use phpDocumentor\Reflection\DocBlock\Tags\Link;

class MainController extends Controller
{
    public function index(){
    return view('welcome');
    }
    public function post_url(Request $request){

        function url_generator(){
            $string = range('a','z');
            $string =array_merge($string ,range(0,9));
            shuffle($string);
            $string  = implode('',array_slice($string,rand(0,20),5));
            $reg_shorten = Url::where('shorten',$string)->get();
            if(count($reg_shorten)){
                return url_generator();
            }else{
                return $string;
            }
        }
        $input = $request->url;
        $reg_link = Url::where('url',$input)->get();

            $shorten =url_generator();
            $url = new Url();
            $url->url = $request->url;
            $url->shorten = $shorten;
            $url->user_id = 0;
            $url->click_count= 0;
            if (!empty(Auth::user()->id)){
                $url->user_id = Auth::user()->id;
            }
            $url->save();
            $new_url =$shorten;

        return view('url')->with(['new_url'=>$new_url]);
    }
    public function go_url($shorten){
        $url = new Url();
        $result = $url->where('shorten',$shorten)->get();
        if(count($result)){
            $link = $result[0]['url'];
            $visit = $result[0]['click_count']+1;
            $url->where('shorten',$shorten)->update(['click_count'=>$visit]);
            return Redirect::to($link);
        }else{
            return redirect('/');
        }
    }
    public function dash(){
        $urls = Url::where('user_id',Auth::user()->id)->where('deleted_at',null)->get();
        return view('dash')->with(['urls'=>$urls]);
    }
    public function delete($id){
        $del = false;
        if(Url::find($id)->delete()){
            $del = true;
        };
        return redirect('dash')->with('del',$del);
    }
}
