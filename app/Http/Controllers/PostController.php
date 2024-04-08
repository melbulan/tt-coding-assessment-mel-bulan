<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'tag_ids' => 'nullable|array',
        ]);

        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'tag_ids' => $request->tag_ids, // Assuming $request->tag_ids is an array
        ]);

        return response()->json(['message' => 'Post created successfully', 'post' => $post], 201);
    }
}
