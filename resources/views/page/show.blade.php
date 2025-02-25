### Page ###
<x-layout-app>
    <div class="container-xl">
        <h1>{{$page->title}}</h1>
        @foreach($page->parts as $part)
            {!! $part->content !!}
        @endforeach

        <div>
            <hr/>
            <h3>{{ __('Komentáře') }}</h3>
            <livewire:comment.form :commentable_id="$page->id" :key="'form.' . $page->id">
            <livewire:comment.data-table :commentable="$page" :key="'datatable.' . $page->id">
        </div>
    </div>
</x-layout-app>
