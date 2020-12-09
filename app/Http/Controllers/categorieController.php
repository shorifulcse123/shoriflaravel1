<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class categorieController extends Controller
{
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:4',
        'slug' => 'required|unique:categories|max:255|min:4',
        ]);


    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;

    	$categorie=DB::table('categories')->insert($data);

    	if ($categorie) {?>

    		<script> alert('inserted seccessfully!!')</script>



    		<?php

    		return view('view');

    		
    		
    	}else{?>

    		<script> alert('somthing went wrong!!')</script>

    		<?php

    		return view('view');

    	}

    	
    	
    }

    public function view()
    {
    	$categorie=DB::table('categories')->get();

    	return view('view',compact('categorie'));
    }

     public function viewSingel($id)
    {
    	$categorie=DB::table('categories')->where('id',$id)->first();

    	return view('singlePost',compact('categorie'));
    }

    public function editSingel($id)
    {
    	$categorie=DB::table('categories')->where('id',$id)->first();

    	return view('editPost',compact('categorie'));
    }

    public function UpdatePost(Request $request,$id)
    {
    	$validatedData = $request->validate([
        'name' => 'required|unique:categories|max:25|min:4',
        'slug' => 'required|unique:categories|max:255|min:4',
        ]);


    	$data=array();
    	$data['name']=$request->name;
    	$data['slug']=$request->slug;

    	$categorie=DB::table('categories')->where('id',$id)->update($data);

    	if ($categorie) {?>

    		<script> alert('update seccessfully!!')</script>



    		<?php

    		return view('view');

    		
    		
    	}else{?>

    		<script> alert('somthing went wrong!!')</script>

    		<?php

    		return view('view');

    	}

    	
    }

    public function DeletePost($id)
    {
    	

    	$categorie=DB::table('categories')->where('id',$id)->delete();

    	if ($categorie) {?>

    		<script> alert('update seccessfully!!')</script>



    		<?php

    		return view('view');

    		
    		
    	}else{?>

    		<script> alert('somthing went wrong!!')</script>

    		<?php

    		return view('view');

    	}

    	
    }

     public function ViewSinglePost($id)
    {
        $post=DB::table('posts')
        ->join('categories','posts.cat_id','categories.id')
        ->select('posts.*','categories.name','categories.slug')
        ->where('posts.id',$id)
        ->first();
        return view('singleViewPost',compact('post'));
        

    }

    



}
