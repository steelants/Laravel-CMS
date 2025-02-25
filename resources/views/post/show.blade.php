### Post ###
<x-layout-app>
    <div class="container-xl">
        <h1>{{$post->title}}</h1>
        @foreach($post->parts as $part)
            {!! $part->content !!}
        @endforeach

        @if(!empty($post->id))
            <div>
                <livewire:comment.data-table :commentable="$post" :key="$post->id"/>
            </div>
        @endif
    </div>
</x-layout-app>
