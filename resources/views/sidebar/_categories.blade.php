<h3>Categories</h3>

<div class="card">
    <div class="card-body">
        <ul>
            @foreach($categories as $category)
                <li><a href="{{ route('categories.show', $category) }}">{{ $category->name }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
