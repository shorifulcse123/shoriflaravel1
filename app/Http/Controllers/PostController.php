<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
	public function write()
    {
    	$categorie=DB::table('categories')->get();
    	return view('write',compact('categorie'));
    }

    public function insertPosts(Request $request)
    {
    	$validatedData = $request->validate([
             'title' => 'required|max:200',
             'details' => 'required',
             'image' => 'required | mimes:jpeg,jpg,png,PNG | max:1000',
         ]);

    	$data=array();
    	$data['title']=$request->title;
    	$data['cat_id']=$request->cat_id;
    	$data['details']=$request->details;
    	$image=$request->file('image');
    	


    	if ($image) {
    		$image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/Postimage/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            DB::table('posts')->insert($data);



    		?>

    		<script> alert('inserted seccessfully!!')</script>
    		



    		<?php

    		return view('write');

    		
    		
    	}else{

             DB::table('posts')->insert($data);

    		?>

    		<script> alert('inserted seccessfully!!')</script>

    		<?php

    		return view('write');


    	}


    }

    public function allview()
    {
    	$post=DB::table('posts')
    	->join('categories','posts.cat_id','categories.id')
        ->select('posts.*','categories.name','categories.slug')
    	->get();
    	return view('allviewPost',compact('post'));

    	
    }

    public function EditeImagePost($id)
    {
        $categorie=DB::table('categories')->get();
        $post=DB::table('posts')->where('id',$id)->first();



        return view('singleEditPost',compact('categorie','post'));
        

    }

    public function updateImagePost(Request $request,$id)
    {
        $validatedData = $request->validate([
             'title' => 'required|max:200',
             'details' => 'required',
             'image' => 'mimes:jpeg,jpg,png,PNG | max:1000',
         ]);

        $data=array();
        $data['title']=$request->title;
        $data['cat_id']=$request->cat_id;
        $data['details']=$request->details;
        $image=$request->file('image');
        


        if ($image) {
            $image_name=hexdec(uniqid());
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/frontend/Postimage/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            $data['image']=$image_url;
            unlink($request->old_photo);
            DB::table('posts')->where('id',$id)->update($data);



            ?>

            <script> alert('update seccessfully!!')</script>
            



            <?php

            return Redirect()->route('allviewPost');

            
            
        }else{

            $data['image']=$request->old_photo;

             DB::table('posts')->where('id',$id)->update($data);

            ?>

            <script> alert('update seccessfully!!')</script>

            <?php

           return Redirect()->route('allviewPost');


        }


    }

    public function deleteImagePost($id)

    {
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->image;

        $categorie=DB::table('posts')->where('id',$id)->delete();

        if ($categorie) {
            unlink($image);
             ?>

            <script> alert('delete seccessfully!!')</script>

            <?php
            return view('allviewPost');

        }else{
             ?>

            <script> alert('delete seccessfully!!')</script>

            <?php

        }


       

    }

   

}
