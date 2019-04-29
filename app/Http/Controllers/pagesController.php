<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function home(){
    		$title='/';
           return view('home')->with('title',$title);
    }
    public function about(){
           $title='about';
           return view('about')->with('title',$title);
    }
    public function contact(){
           $contacts= array(
           	'title'=>'CONTACT US',
           	'contacts'=>['facebook','twitter','whatsapp']
            );
           return view('contact')->with($contacts);
    }
}
