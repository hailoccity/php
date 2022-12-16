<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use SebastianBergmann\Diff\Line;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return
     */
    public function index(Request $request)
    {
//        $post_query = Post::withCount('comments')->where('user_id')->get();
//        if($request->sortByComments && in_array($request->sortByComments, ['asc', 'desc'])){
//            $post_query->orderBy('comments_count', $request->sortByComments);
//        }
        $data['categories'] = Category::orderBy('id', 'desc')->get();
        $post_query = Post::where('user_id', auth()->id());
        if($request->category){
            $post_query->whereHas('category', function ($q) use ($request){
                $q->where('name', $request->category);
            });
        }
        if ($request->keyword){
            $post_query->where('title', 'LIKE', '%'.$request->keyword.'%');
        }
        $data['posts'] = $post_query->orderBy('id', 'asc')->paginate(5);
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return
     */
    public function create()
    {   $data['categories'] = Category::orderBy('id', 'desc')->get();
        $data['tags'] = Tag::orderBy('id', 'desc')->get();
        return view('posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|max:255',
            'description'=>'required',
            'image'=>'required|mimes:jpeg,jpg,png',
            'category'=>'required',
            'tags'=>'required|array'
        ],[
            'category.required'=>'Please select a category',
            'tags.required'=>'Please select atlest one tag'
        ]);
        if ($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time().'.'.$image->extension();
            $image->move(public_path('post_image'), $image_name);
        }
        $post = Post::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$request->image,
            'user_id'=>auth()->id(),
            'category_id'=>$request->category
        ]);
        $post->tags()->sync($request->tags);
        return  redirect()->route('posts.index')->with('success', 'Post successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
