<?php

namespace SteelAnts\LaravelCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use SteelAnts\LaravelCMS\Models\Node;
use SteelAnts\LaravelCMS\Types\NodeType;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = Node::where('type', NodeType::PAGE)->where('slug', $slug)->first();
        return view('cms::page.show', ['page' => $page]);
    }
}
