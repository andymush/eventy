<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use DB;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::all();
        $posts = DB::select('SELECT * FROM posts');
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'venue'=> 'required',
            'description'=> 'required',
            'event_poster'=> 'image|nullable|max:1999'
            
        ]);
            //Upload handler
            if($request->hasFile('event_poster')){
                $filenameWithExt = $request->file('event_poster')->getClientOriginalName();

                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);

                $fileNameToStore = $filename;

                $path = $request->file('event_poster')->storeAs('public/event_posters', $fileNameToStore);
            }else{
                $fileNameToStore = 'no poster.jpg';
            }


            //Create Post
            $post = new Post;
            $post->title = $request->input('title');
            $post->venue = $request->input('venue');
            $post->description = $request->input('description');
            $post->event_poster = $fileNameToStore;
            $post->user_id = auth()->user()->id;
            $post->save();

            return redirect('/posts')->with('success','Event created');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
        
    }

    public function myevents()
    {

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('posts.myevents')->with('posts',$user->posts);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);

        //Check for the user who created the post
        If(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','You are Unauthorized');
        }

        return view('posts.edit')->with('post', $post);
        
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
        $this->validate($request,[
            'title' => 'required',
            'venue'=> 'required',
            'description'=> 'required',
            
        ]);
            //Update Post
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->venue = $request->input('venue');
            $post->description = $request->input('description');
            $post->save();

            return redirect('/posts')->with('success','Event created');
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

        //Check for the user who created the post
        If(auth()->user()->id !==$post->user_id){
            return redirect('/posts')->with('error','You are Unauthorized');
        }
        $post->delete();

        return redirect('/posts')->with('success','Event removed');

    }
}
