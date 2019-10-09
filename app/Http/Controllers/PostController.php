<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{
    public function WritePost(){
    	$category = DB::table('categories')->get();
        return view('posts.write', compact('category'));
    }
    public function StorePost(Request $req){
    	$validatedDate = $req->validate([
            'title'=> 'required|min:4',
            'details'=> 'required|min:4',
            'image'=> 'required|mimes:jpeg,jpg,png,PNG|max:1000',
        ]);
        $data = array();
        $data['title'] 			= $req->title;
        $data['category_id'] 	= $req->category_id;
        $data['details'] 		= $req->details;

        $image = $req->file('image');
        	if($image){
        		$image_name 	= hexdec(uniqid());
        		$ext 			= strtolower($image->getClientOriginalExtension());
        		$image_full_name= $image_name.'.'.$ext;
        		$upload_path	= 'public/fontend/image/';
        		$image_url		= $upload_path.$image_full_name;
        		$success		= $image->move($upload_path,$image_full_name);
        		
        		$data['image']	= $image_url;
        		DB::table('posts')->insert($data);
        		$notification = array(
	            'messege'=>'Successfully Post Inserted',
	            'alert-type'=>'success'
	            );
	            return Redirect()->route('all.post')->with($notification);

        	}else{
        		DB::table('posts')->insert($data);
        		$notification = array(
	            'messege'=>'Successfully Post Inserted Without Image',
	            'alert-type'=>'success'
	            );
	            return Redirect()->back()->with($notification);
	        }
    }
    public function AllPost(){
    	//$post = DB::table('posts')->get();
    	$post = DB::table('posts')->join('categories', 'posts.category_id', 'categories.id')->select('posts.*','categories.name')->get();
    	return view('posts.allpost',compact('post'));
    }
    public function ViewPost($id){
    	$post = DB::table('posts')->join('categories', 'posts.category_id', 'categories.id')->select('posts.*','categories.name')->where('posts.id',$id)->first();
    	return view('posts.view_post', compact('post'));
    }
    public function EditPost($id){
    	$post = DB::table('posts')->where('id',$id)->first();
    	$category = DB::table('categories')->get();
    	return view('posts.edit_post', compact('post','category'));
    }
    public function UpdatePost(Request $req,$id){
    	$validatedDate = $req->validate([
            'title'=> 'required|min:4',
            'details'=> 'required|min:4',
            'image'=> 'mimes:jpeg,jpg,png,PNG|max:1000',
        ]);
        $data = array();
        $data['title'] 			= $req->title;
        $data['category_id'] 	= $req->category_id;
        $data['details'] 		= $req->details;

        $image = $req->file('image');
        	if($image){
        		$image_name 	= hexdec(uniqid());
        		$ext 			= strtolower($image->getClientOriginalExtension());
        		$image_full_name= $image_name.'.'.$ext;
        		$upload_path	= 'public/fontend/image/';
        		$image_url		= $upload_path.$image_full_name;
        		$success		= $image->move($upload_path,$image_full_name);
        		$data['image']	= $image_url;

        		unlink($req->old_image);
        		DB::table('posts')->where('id',$id)->update($data);
        		$notification = array(
	            'messege'=>'Successfully Post Updated',
	            'alert-type'=>'success'
	            );
	            return Redirect()->route('all.post')->with($notification);

        	}else{
        		$data['image'] = $req->old_image;
        		DB::table('posts')->where('id',$id)->update($data);
        		$notification = array(
	            'messege'=>'Successfully Post Update With Old Image',
	            'alert-type'=>'success'
	            );
	            return Redirect()->route('all.post')->with($notification);
	        }
    }
    public function DeletePost($id){
    	$post = DB::table('posts')->where('id',$id)->first();
    	$image = $post->image;
    	$delete = DB::table('posts')->where('id',$id)->delete();
    	if ($delete) {
    		unlink($image);
    		$notification = array(
	            'messege'=>'Successfully Post Delete',
	            'alert-type'=>'success'
	            );
	            return Redirect()->route('all.post')->with($notification);
    	}else{
    		$notification = array(
	            'messege'=>'Something Wrong !',
	            'alert-type'=>'error'
	            );
	            return Redirect()->route('all.post')->with($notification);
    	}
    }
    public function Home(){
    	$post = DB::table('posts')->join('categories', 'posts.category_id', 'categories.id')->select('posts.*','categories.name','categories.slug')->paginate(3);
    	return view('pages.home',compact('post'));
    }
}
