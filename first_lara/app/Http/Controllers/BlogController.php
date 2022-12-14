<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

// php artisan
// php artisan make:controller [name] --resource

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = DB::select("SELECT * FROM posts WHERE id = :id", [":id" => 1]);
        // $posts = DB::table('posts')
        //     ->get();

        $posts = Post::latest()->get();
        return view('welcome', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts',
            'image_path' => 'required',
            'discription' => 'required',
            'body' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'image_path' => $this->storeImg($request),
            'discription' => $request->discription,
            'body' => $request->body
        ]);

        return redirect('/')->with('message', 'Article Submitted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('edit', ['post' => Post::find($id)]);
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
        $request->validate([
            'title' => 'required',
            'discription' => 'required',
            'body' => 'required'
        ]);

        if($request->image_path){
            $post = Post::find($id);
            File::delete(public_path("/images/$post->image_path"));
            Post::where('id', $id)->update([
                'title' => $request->title,
                'image_path' => $this->storeImg($request),
                'discription' => $request->discription,
                'body' => $request->body
            ]);
        }
        else {
            Post::where('id', $id)->update($request->except('_token', '_method'));
        }

        return redirect('/')->with('message', 'Article Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        File::delete(public_path("/images/$post->image_path"));
        Post::destroy($id);
        return redirect('/')->with('delete', 'Article Deleted Successfully');
    }
    private function storeImg($request){
        $newFileName = uniqid() . '-' . $request->title . '.' . $request->image_path->extension();
        $request->image_path->move(public_path('images'), $newFileName);

        return $newFileName;
    }
}
