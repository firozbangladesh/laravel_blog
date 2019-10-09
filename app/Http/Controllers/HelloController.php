<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HelloController extends Controller
{
    public function About(){
    	return view('pages.about');
    }
    public function Blog(){
    	return view('pages.blog');
    }
    public function News(){
    	return view('pages.news');
    }
    public function Contact(){
    	return view('pages.contact');
    }
    public function AddCategory(){
        return view('posts.add_category');
    }
    public function StoreCategory(Request $req){
        $validatedDate = $req->validate([
            'name'=> 'required|unique:categories|max:20|min:4',
            'slug'=> 'required|unique:categories|max:20|min:4',
        ]);

        $data = array();
        $data['name'] = $req->name;
        $data['slug'] = $req->slug;

        $category = DB::table('categories')->insert($data);

        if($category){
            $notification = array(
                'messege'=>'Successfully Category Inserted',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something Wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
    public function AllCategory(){
        $category = DB::table('categories')->get();
        return view('posts.all_category', compact('category'));
    }
    public function ViewCategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('posts.view_category', compact('category'));

    }
    public function DeleteCategory($id){
        $delete = DB::table('categories')->where('id',$id)->delete();
           
            $notification = array(
            'messege'=>'Successfully Category Deleted',
            'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
    }
    public function EditCategory($id){
        $category = DB::table('categories')->where('id',$id)->first();
        return view('posts.edit_category', compact('category'));
    }
    public function UpdateCategory(Request $req,$id){
        $validatedDate = $req->validate([
            'name'=> 'required|max:20|min:4',
            'slug'=> 'required|max:20|min:4',
        ]);

        $data = array();
        $data['name'] = $req->name;
        $data['slug'] = $req->slug;

        $category = DB::table('categories')->where('id',$id)->update($data);

        if($category){
            $notification = array(
                'messege'=>'Successfully Category Updated',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something Wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
