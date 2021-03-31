<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Booked;
use DB;

class PagesController extends Controller
{
    public function index(){
        return view('pages.index');
    }

    public function booked(){

        $posts = DB::select('SELECT id FROM booked_events');

       /* $user_id = auth()->user()->id;
        $post_id = Post::find($id); */
        return view('posts.booked');
        
    }
    public function myevents(){
        return view('pages.myevents');
    }
    
    public function bookevent()
    {
        $post = new booked;
        $post->user_id = auth()->user()->id;
        $post->post_id = id;
        $post->save();


        return redirect('/posts')->with('success','Event Booked');
    }

}
