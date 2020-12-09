<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HelloController extends Controller
{
    public function contact()
    {
    	return view('Contact');
    }

    

     public function add()
    {
    	return view('add');
    }

    public function index()
    {
    	$post=DB::table('posts')
    	->join('categories','posts.cat_id','categories.id')
    	->select('posts.*','categories.name','categories.slug')
    	->paginate(3);

    	
    	return view('index',compact('post'));
    }
}
