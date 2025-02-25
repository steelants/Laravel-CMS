<div>
	<x-form::form wire:submit.prevent="{{$action}}">
		<x-form::textarea group-class="mb-3" wire:model="content" id="content"/>
		<x-form::button class="btn-primary" type="submit">@if($action == 'update') {{__('Upravit')}} @else {{__('Vytvořit')}} @endif</x-form::button>
	</x-form::form>
</div>