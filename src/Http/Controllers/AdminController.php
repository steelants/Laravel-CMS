<?php

namespace SteelAnts\LaravelCMS\Http\Controllers;

use App\Http\Controllers\Controller;
use SteelAnts\LaravelCMS\Models\Node;
use SteelAnts\LaravelCMS\Types\NodeType;

class AdminController extends Controller
{
    public function pages()
    {
        return view('cms::admin.show', [
            'title' => __('Stránky'),
            'modal' => 'node.form',
            'datatable' =>'node.data-table',
            'parameters' => ['type' => NodeType::PAGE],
        ]);
    }

    public function posts()
    {
        return view('cms::admin.show', [
            'title' => __('Příspěvky'),
            'modal' => 'node.form',
            'datatable' =>'node.data-table',
            'parameters' => ['type' => NodeType::POST],
        ]);
    }
}
