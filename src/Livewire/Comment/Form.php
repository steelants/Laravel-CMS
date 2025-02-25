<?php

namespace SteelAnts\LaravelCMS\Livewire\Comment;

use Livewire\Component;
use SteelAnts\LaravelCMS\Models\Comment;
use SteelAnts\LaravelCMS\Models\Node;

class Form extends Component
{
    public $model;
    public $commentable_id;

    public int $parent_id = 0;
    public string $content = '';

    public $action = 'store';

    protected function rules()
    {
        return [
            'parent_id' => 'nullable|integer',
            'content'   => 'required',
        ];
    }

    public function mount($model = null, $parent_id = 0)
    {
        $this->parent_id = $parent_id;
        if (!empty($model)) {
            $comment = Comment::find($model);

            $this->model = $model;

            $this->parent_id = $comment->parent_id;
            $this->content = $comment->content;

            $this->action = 'update';
        }
    }

    public function store()
    {
        $validatedData = $this->validate();
        Node::find($this->commentable_id)->comments()->create($validatedData);
        $this->dispatch('commentAdded');
        $this->dispatch('closeModal');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $comment = Comment::find($this->model);
        if (!empty($comment)) {
            $comment->update($validatedData);
        }
        $this->dispatch('commentEdited');
        $this->dispatch('closeModal');
    }

    public function render()
    {
        return view('cms::livewire.comment.form');
    }
}
