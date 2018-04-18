<?php

namespace TestProject\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use TestProject\Post;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts =  Post::all();
        //for pagination 
       // $posts =  Post::orderBy('title','asc')->paginate(1); and in view type {{$posts->link()}}
       // $posts =  Post::orderBy('title','asc')->get();
        //$posts = Post::where('title','Post Two')->get();
        //$posts = \DB::select('SELECT * FROM posts');
        
        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view ('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required',
            'cover_image' => 'image|nullable|max:1999' //image makes sure it is jpeg.jpj format and it can be null and the file name is limited to store in apache
            ]);
        
        //Handle the file
        if($request->hasfile('cover_image')){
            //Geting the file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();            
            //Getting just the filename
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);            
            //Getting just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();            
            //Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;            
            //Upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }else{            
            $fileNameToStore = 'noimage.jpg';
        }
        
        //Create Post
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->cover_image = $fileNameToStore;
        $post->save();
        
        return redirect('posts')->with('success','Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post =  Post::find($id);
        return view('posts.show')->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post =  Post::find($id);
        return view('posts.view')->with('post',$post);
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
        $this->validate($request, [
            'title'=>'required',
            'body'=>'required'
            ]);
        //Handle the file
        if($request->hasfile('cover_image')){
            //Geting the file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();            
            //Getting just the filename
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);            
            //Getting just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();            
            //Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;            
            //Upload the image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        
        //Create Post
        $post = Post::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        if($request->hasfile('cover_image')){
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        
        return redirect('posts')->with('success','Post Updated');
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
        
        if($post->cover_image != 'noimage.jpg'){
            //Delete the image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        
        $post->delete();
        
        return redirect('posts')->with('success','Post Deleted');
        
    }
}
