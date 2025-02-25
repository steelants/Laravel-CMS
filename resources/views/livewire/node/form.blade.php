<div>
	<x-form::form wire:submit.prevent="{{$action}}">
		<x-form::input group-class="mb-3" type="number" wire:model="order" id="order" label="{{ __('Pořadí') }}"/>
		<x-form::input group-class="mb-3" type="text" wire:model.live="title" id="title" label="{{ __('Nadpis') }}"/>
		<x-form::input group-class="mb-3" type="text" wire:model="slug" id="slug" label="{{ __('Slug') }}"/>
        @foreach($parts as $id => $oneData)
            <x-form::quill group-class="mb-3" label="Quill" wire:model="parts.{{$id}}" />
        @endforeach
		<div class="mb-3">
			<label>{{ __('Data') }}</label>
			@if(!empty($data) && count($data) > 0)
				@foreach ($data as $id => $oneData)
					<div class="input-group mb-3">
						<span class="input-group-text" title="{{ __('Klíč') }}"><i class="fas fa-key"></i></span>
						<x-form::input group-class="col-4" class="rounded-0" type="text" wire:model="data.{{ $id }}.key" id="data"/>
						<span class="input-group-text" title="{{ __('Hodnota') }}"><i class="fas fa-hashtag"></i></span>
						<x-form::input group-class="col-5" class="rounded-0" type="text" wire:model="data.{{ $id }}.value" id="data"/>
						<x-form::button group-class="input-group-append" class="btn-danger" type="button" wire:click="removeData('{{ $id }}')"><i class="fas fa-times"></i></x-form::button>
					</div>
				@endforeach
			@endif
			<div class="mb-3">
				<a class="btn btn-secondary" wire:click.prevent="addData"><i class="fas fa-plus"></i></a>
			</div>
		</div>
		<div class="input-group">
			<x-form::select class="rounded-0" wire:model="status" :options="$statuses" id="status"/>
			<x-form::button class="btn-primary" type="submit">@if($action == 'update') {{__('Upravit')}} @else {{__('Vytvořit')}} @endif</x-form::button>
		</div>
	</x-form::form>
</div>
