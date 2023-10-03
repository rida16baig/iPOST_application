<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }
    public function store(Request $request)
    {
        $validated_data = $request->validate([ 
            'title' => 'required|unique:posts',
            'excerpt' => 'required',
            'body' => 'required'
        ]);
        $result = Post::create($validated_data);

        if ($result) {
            return redirect()->back()->with('success', 'Data entered successfully!');
        }
    }

    public function read()
    {
        $users = DB::table('posts')->orderBy('id')->Paginate(10)->withQueryString();
        return view('posts.read', [ 'data' => $users ]);
    }

    public function edit($id)
    {
        $result = POST::find($id);
        return view('posts.edit', [ 'id' => $result ]);
        // dd($result);
    }


    public function update(Request $request, $id)
    {
        $validated_data = $request->validate([ 
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required'
        ]);

        $result = Post::where('id', $id)->update($validated_data);

        if ($result) {
            return redirect()->route('post.read')->with('success', 'Data updated Successfully');
        }

    }


    public function delete($id)
    {
        $result = Post::destroy($id);

        if ($result) {
            return redirect()->route('post.read')->with('success', 'Data deleted successfully');
        }

    }

}