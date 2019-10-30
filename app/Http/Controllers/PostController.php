<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{	

	public function __construct()
	{
		// set timzone
		date_default_timezone_set("Asia/Manila");
	}

    public function form($_id = false)
    {	
    	if($_id)
    	{
    		$data = Post::findOrFail($_id);

    		return view('posts.form', compact('data'));
    	}

    	return view('posts.form');
    }

    public function store(Request $request)
    {	
		// dd($request->all());
    	// dd(now()->format('Y-m-d h:iA'));
		$data = new Post($request->all());
		$data->date = now()->format('Y-m-d h:i A');
		$data->posted_by = auth()->user()->name;
		// dd($data);
		$data->save();

		return redirect()->route('home');
    }
    
    public function update(Request $request, $_id)
    {	
		// dd($request->all());
		$data = Post::findOrFail($_id);
		$data->title = $request->title;
		$data->body = $request->body;
		$data->date = now()->format('Y-m-d h:i A');
		$data->posted_by = auth()->user()->name;
		// dd($data);
		$data->save();

		return redirect()->route('home');
    }

    public function delete($_id)
    {
    	$data = Post::destroy($_id);

    	if($data)
    	{
    		return redirect()->route('home');
    	}else
    	{
    		dd('Error Deletion of data');
    	}
    }

}
