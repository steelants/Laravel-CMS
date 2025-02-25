<x-layout-app>
    <div class="container-xl">
        <div class="page-header">
            <h1>{{ $title }}</h1>

            @if (!empty($modal))
                <button class="btn btn-primary"
                        onclick="Livewire.dispatch('openModal', {livewireComponents: '{{ $modal }}', title:  '{{ $title }}', parameters: {{json_encode($parameters)}}})">
                    <i class="me-2 fas fa-plus"></i><span>{{ __('Přidat') }}</span>
                </button>
            @endif

        </div>
        @livewire($datatable, $parameters, key('data-table'))
    </div>
</x-layout-app>
