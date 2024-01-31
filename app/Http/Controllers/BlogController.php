<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $posts = BlogPost::orderBy('created_at', 'desc')->get();
        // $postCount = BlogPost::count();

        // $posts = BlogPost::orderBy('created_at', 'desc')->paginate(2);
        return view('blogposts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('blogposts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);
        $incomingFields['user_id'] = auth()->id();
        BlogPost::create($incomingFields);
        
        return redirect('/blogs');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $blog = BlogPost::find($id);
        return view('blogposts.show', ['blog' => $blog]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = BlogPost::find($id);
        return view('blogposts.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        $blog = BlogPost::find($id);
        if (auth()->user()->id !== $blog['user_id']) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }

        $incomingFields = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $incomingFields['title'] = strip_tags($incomingFields['title']);
        $incomingFields['content'] = strip_tags($incomingFields['content']);

        $blog->update($incomingFields);
        return redirect('blogs');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $blog = BlogPost::find($id);
        if (auth()->user()->id !== $blog['user_id']) {
            return redirect()->back()->with('error', 'Unauthorized access');
        }
        $blog->delete();
        return redirect('blogs');
    }
}
