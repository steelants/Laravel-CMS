<?php
namespace SteelAnts\LaravelCMS\Livewire\Node;

use Livewire\Component;
use SteelAnts\LaravelCMS\Models\Node;
use SteelAnts\LaravelCMS\Types\NodeType;
use SteelAnts\LaravelCMS\Types\StatusType;
use Illuminate\Support\Str;

class Form extends Component
{
    public $model;
    public int $order = 0;
    public int $user_id;
	public string $slug = '';
	public string $title = '';
	public array $data = [];
	public string $type = 'page';
	public int $status = 0;
    public array $parts = [];

    public array $typesKeys = [];
    public array $statuses = [];
    public array $statusesKeys = [];

    public $action = 'store';

    protected function rules()
    {
        return [
            'order' => 'nullable|integer',
			'slug' => 'required|unique:nodes,slug' . (!empty($this->model) ? ',' . $this->model . ',id': ''),
			'title' => 'nullable|string',
            'data' => 'nullable|array',
			'data.*' => 'required|array',
            'data.*.key' => 'required|string',
            'data.*.value' => 'required|string',
			'type' => 'required|in_array:typesKeys.*',
			'status' => 'nullable|integer|in_array:statusesKeys.*',
        ];
    }

    public function mount ($model = null, $type = 'page'){
        $this->typesKeys = array_keys(NodeType::getAll());
        $this->statuses = StatusType::getAll();
        $this->statusesKeys = array_keys($this->statuses);
        $this->type = $type;

        if (!empty($model)) {
            $node = Node::find($model);

            $this->model = $model;

            $this->order = $node->order;
            $this->user_id = $node->user_id;
			$this->slug = $node->slug;
			$this->title = $node->title;
			$this->data = $node->data;
			$this->type = $node->type;
			$this->status = $node->status;
            $this->parts = $node->parts->pluck('content', 'id')->toArray();

            $this->action = 'update';
        }
    }

    public function updatingTitle($value)
    {
        $oldSlug = Str::slug($this->title);
        if (empty($this->slug) || $this->slug == $oldSlug) {
            $this->slug = Str::slug($value);
        }
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['user_id'] = auth()->id();
        Node::create($validatedData);
        $this->dispatch('nodeAdded');
        $this->dispatch('closeModal');
    }

    public function update()
    {
        $validatedData = $this->validate();
        $node = Node::find($this->model);
        if (!empty($node)) {
            $node->update($validatedData);
        }
        $this->dispatch('nodeEdited');
        $this->dispatch('closeModal');
    }

    public function addData()
    {
        $this->data[] = ['key' => '', 'value' => ''];
    }

    public function removeData($id)
    {
        if (in_array($id, array_keys($this->data))) {
            unset($this->data[$id]);
        }
    }

    public function render()
    {
        return view('cms::livewire.node.form');
    }
}
