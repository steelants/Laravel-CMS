<?php

namespace SteelAnts\LaravelCMS\Livewire\Node;

use SteelAnts\LaravelCMS\Models\Node;
use SteelAnts\DataTable\Livewire\DataTableComponent;
use Illuminate\Database\Eloquent\Builder;
use SteelAnts\DataTable\Traits\UseDatabase;
use SteelAnts\LaravelCMS\Types\NodeType;
use SteelAnts\LaravelCMS\Types\StatusType;

class DataTable extends DataTableComponent
{
    use UseDatabase;

    public string $type;
    public string $sortDirection = "desc";
    public string $sortBy = "order";

    public $listeners = [
        'nodeAdded'  => '$refresh',
        'nodeEdited' => '$refresh',
        'closeModal' => '$refresh',
    ];
    public function mount($type)
    {
        $this->type = $type;
    }

    public function query(): Builder
    {
        return Node::query()->with(['user'])->where('type', $this->type);
    }

    public function headers(): array
    {
        return [
            'order'     => __('Pořadí'),
            'user.name' => __('Autor'),
            'slug'      => __('Slug'),
            'title'     => __('Nadpis'),
            'type'      => __('Typ'),
            'status'    => __('Stav'),
        ];
    }

    public function renderColumnType(mixed $value, $row): string
    {
        return e(NodeType::getName($value));
    }

    public function renderColumnStatus(mixed $value, $row): string
    {
        return e(StatusType::getName($value));
    }

    public function actions($item)
    {
        return [
            [
                'type'       => "livewire",
                'action'     => "edit",
                'text'       => __('Upravit'),
                'parameters' => $item['id'],
                'iconClass'  => 'fas fa-pen',
            ],
            [
                'type'        => "livewire",
                'action'      => "remove",
                'parameters'  => $item['id'],
                'text'        => __('Odstranit'),
                'actionClass' => 'text-danger',
                'iconClass'   => 'fas fa-trash',
            ],
        ];
    }

    public function remove($node_id)
    {
        Node::find($node_id)->delete();
    }

    public function edit($node_id)
    {
        $this->dispatch('openModal', 'node.form', __('Upravit nodu'), ['model' => $node_id]);
    }
}
