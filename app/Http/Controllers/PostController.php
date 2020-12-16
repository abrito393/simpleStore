<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
class PostController extends Controller
{
    public function posts(Request $request)
    {
        return view('posts.index');
    }

    public function getPosts(Request $request)
    {
        $ch = curl_init("https://jsonplaceholder.typicode.com/posts"); 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
        curl_setopt($ch, CURLOPT_POST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        $output = curl_exec($ch); 
        curl_close($ch);  
        $results = json_decode($output);
        foreach ($results as $result) {
            Post::create([
               "userId" => $result->userId,   
               "id" => $result->id,   
               "title" => $result->title,   
               "body" => $result->body,   
            ]);
        }
        return redirect()->route('posts');
    }

    public function showPosts(Request $request)
    {
        return view('posts.show')->with('data',Post::paginate(15));
    }
}
