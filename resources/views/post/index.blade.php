### Posts ###
<br>
@foreach($posts as $post)
    <a href="{{ route('cms.post.show', ['post_id' => $post->id]) }}">{{$post->title}}</a><br>
@endforeach

