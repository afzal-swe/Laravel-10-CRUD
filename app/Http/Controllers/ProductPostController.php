<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product_Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductPostController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // $category = Category::all();
        $product_post = Product_Post::all();
        return view('admin.product_post.index', compact('product_post'));
    }

    public function create()
    {
        // $category = DB::table('categories')->get();
        // $subcategory = DB::table('subcategories')->get();

        $category = Category::all();
        $subcategory = Subcategory::all();
        return view('admin.product_post.create', compact('category', 'subcategory'));
    }
    public function store(Request $request)
    {
        $valide = $request->validate([
            // 'user_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'post_date' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'slug' => 'nullable',
        ]);




        // $slug = Str::of($request->title)->slug('-');
        // $post = array();
        // $post['user_id'] = Auth::id();
        // $post['category_id'] = $request->category_id;
        // $post['subcategory_id'] = $request->subcategory_id;
        // $post['title'] = $request->title;
        // $post['tags'] = $request->tags;
        // $post['description'] = $request->description;
        // $post['status'] = $request->status;
        // $post['slug'] = $slug;
        // $post['post_date'] = $request->post_date;

        // $photo = $request->image;
        // if ($photo) {
        //     $photoname = $slug . '.' . $photo->getClientOriginalExtension(); // slug.png
        //     Image::make($photo)->resize(600, 400)->save('public/media' . $photoname);
        //     $post['image'] = 'public/media' . $photoname;

        //     DB::table('product__posts')->insert($post);

        //     $notification = array('messege' => 'Successfully Uploaded!', 'alert-type' => "success");
        //     return redirect()->back()->with($notification);
        // }
        // DB::table('product__posts')->insert($post);

        // $notification = array('messege' => 'Successfully Uploaded!', 'alert-type' => "success");
        // return redirect()->back()->with($notification);





        $valide['user_id'] = Auth::id();
        $valide['slug'] = Str::of($request->title)->slug('-');
        if (Product_Post::create($valide));


        $notification = array('messege' => 'Successfully Uploaded!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    public function destroy($id)
    {
        // DB::table('subcategories')->where('id', $id)->delete();

        // $subcategory = Subcategory::find($id);
        // $subcategory->delete();

        // Delete this file with imagees
        // $post=Product_Post::find($id);
        // if(File::existes($post->image)){
        //     File::delete($post->image)
        // }
        // $post->delete();

        Product_Post::destroy($id);

        $notification = array('messege' => 'Successfully Deleted!', 'alert-type' => "success");
        return redirect()->back()->with($notification);
    }
    public function edit($id)
    {
        $category = Category::all();
        $subcategories = Subcategory::all();
        $product_post = Product_Post::find($id);
        return view('admin.product_post.edit', compact('category', 'subcategories', 'product_post'));
    }
    public function update(Request $request, $id)
    {
        $valide = $request->validate([
            // 'user_id' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'title' => 'required',
            'tags' => 'required',
            'description' => 'required',
            'post_date' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            // 'slug' => 'nullable',
        ]);

        // $valide['user_id'] = Auth::id();
        // $valide['slug'] = Str::of($request->title)->slug('-');
        // if (Product_Post::update($valide));

        // $notification = array('messege' => 'Successfully Update!', 'alert-type' => "success");
        // return redirect()->back()->with($notification);
    }
}
