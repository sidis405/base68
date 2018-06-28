@if(session('status'))
    <div class="alert alert-{{ session('type', 'info') }}">
        {{ session('status') }}
    </div>
@endif
