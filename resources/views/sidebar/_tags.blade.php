<h3>Tags</h3>

<div class="card">
    <div class="card-body">
        <ul>
            @foreach($tags as $tag)
                <li><a href="">{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
