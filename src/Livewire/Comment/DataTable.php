<?php

namespace SteelAnts\LaravelCMS\Livewire\Comment;

use SteelAnts\LaravelCMS\Models\Comment;
use SteelAnts\DataTable\Livewire\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use SteelAnts\DataTable\Traits\UseDatabase;

class DataTable extends DataTableComponent
{
    use UseDatabase;

    public $commentable;
    public string $sortDirection = "asc";
    public string $sortBy = "created_at";
    public bool $paginated = false;

    public $listeners = [
        'commentAdded'  => '$refresh',
        'commentEdited' => '$refresh',
        'closeModal'    => '$refresh',
    ];

    public function query(): Builder
    {
        return Comment::query()->with(['commentable', 'user'])->whereMorphRelation('commentable', $this->commentable->getMorphClass(), 'id', $this->commentable->id);
    }

    public function headers(): array
    {
        return [
            'user.name' => __('Uživatel'),
            'content'   => __('Obsah'),
        ];
    }

    public function renderColumnUserName(mixed $value, $row): string
    {
        return e((!empty($row['parent_id']) ? '---' : '') . ($value ?? __('Smazaný uživatel')));
    }

    public function renderColumnContent(mixed $value, $row): string
    {
        return $value;
    }

    public function actions($item)
    {
        return [
            [
                'type'       => "livewire",
                'action'     => "reply",
                'text'       => __("Reagovat"),
                'parameters' => $item['id'],
                'iconClass'  => 'fas fa-reply',
            ],
            [
                'type'       => "livewire",
                'action'     => "edit",
                'text'       => __("Edit"),
                'parameters' => $item['id'],
                'iconClass'  => 'fas fa-pen',
            ],
            [
                'type'        => "livewire",
                'action'      => "remove",
                'parameters'  => $item['id'],
                'text'        => __("Remove"),
                'actionClass' => 'text-danger',
                'iconClass'   => 'fas fa-trash',
            ],
        ];
    }

    public function remove($comment_id)
    {
        Comment::find($comment_id)->delete();
    }

    public function edit($comment_id)
    {
        $this->dispatch('openModal', 'comment.form', __('Upravit komentář'), ['model' => $comment_id]);
    }

    public function reply($comment_id)
    {
        $this->dispatch('openModal', 'comment.form', __('Reakce na komentář'), ['commentable_id' => $this->commentable->id, 'parent_id' => $comment_id]);
    }
}
