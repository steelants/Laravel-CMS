<?php

namespace SteelAnts\LaravelCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use SteelAnts\LaravelCMS\Models\Node;
use SteelAnts\LaravelCMS\Types\NodeType;

class PostController extends Controller
{
    public function index()
    {
        $posts = Node::where('type', NodeType::POST)->get();
        return view('cms::post.index', ['posts' => $posts]);
    }

    public function show($post_id)
    {
        $post = Node::where('type', NodeType::POST);
        if (is_numeric($post_id)) {
            $post = $post->find($post_id);
        } else {
            $post = $post->where('slug', $post_id)->first();
        }
        return view('cms::post.show', ['post' => $post]);
    }
}
