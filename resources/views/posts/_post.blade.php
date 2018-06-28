<div class="row">
    <div class="col-md-12">

        <img src="{{ url($post->cover) }}" style="width: 100%">

        <div class="card">
            <div class="card-header">
                <h4><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></h4>
                <small>posted by {{ $post->user->name }}</small>
                <small>on {{ $post->category->name }}</small>
                <small>{{ $post->created_at->format('d/m/Y H:i') }}</small>
                @can('update', $post)
                    <small class="pull-right"><a href="{{ route('posts.edit', $post) }}">Edit this</a></small>
                @endcan
            </div>
            <div class="card-body">
                <p>
                    {{ $post->preview }}
                </p>

                @if($showFull)
                    <p>
                        {{ $post->body }}
                    </p>
                @endif
            </div>
            <div class="card-footer">{{ join(', ', $post->tags->pluck('name')->toArray()) }}</div>
        </div>
    </div>
</div>
<hr>
