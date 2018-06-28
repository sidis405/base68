<div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title', $post->title) }}">
    @if ($errors->has('title'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('title') }}</strong>
       </span>
   @endif
</div>

<div class="form-group">
    <label for="cover">Cover Photo</label>
    <input type="file" class="form-control{{ $errors->has('cover') ? ' is-invalid' : '' }}" name="cover">
    @if ($errors->has('file'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('file') }}</strong>
       </span>
   @endif
</div>

<div class="form-group">
    <label for="category_id">Category</label>
    <select class="form-control{{ $errors->has('category_id') ? ' is-invalid' : '' }}" name="category_id">
        <option></option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}"
                @if($category->id == old('category_id', $post->category_id)) selected="" @endif >{{ $category->name }}</option>
        @endforeach
    </select>
    @if ($errors->has('category_id'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('category_id') }}</strong>
       </span>
   @endif
</div>

<div class="form-group">
    <label for="preview">Preview</label>
    <textarea class="form-control{{ $errors->has('preview') ? ' is-invalid' : '' }}" name="preview">{{ old('preview', $post->preview) }}</textarea>
    @if ($errors->has('preview'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('preview') }}</strong>
       </span>
   @endif
</div>

<div class="form-group">
    <label for="body">Post body</label>
    <textarea class="form-control{{ $errors->has('body') ? ' is-invalid' : '' }}" name="body" rows="5">{{ old('body', $post->body) }}</textarea>
    @if ($errors->has('body'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('body') }}</strong>
       </span>
   @endif
</div>

<div class="form-group">
    <label for="tags[]">Tags</label>
    <select class="form-control{{ $errors->has('tags') ? ' is-invalid' : '' }}" name="tags[]" multiple="">
        @foreach($tags as $tag)
            <option value="{{ $tag->id }}"
                @if( in_array($tag->id, old('tags', $post->tags->pluck('id')->toArray()))) selected="" @endif
                >{{ $tag->name }}</option>
        @endforeach
    </select>
    @if ($errors->has('tags'))
       <span class="invalid-feedback" role="alert">
           <strong>{{ $errors->first('tags') }}</strong>
       </span>
   @endif
</div>
