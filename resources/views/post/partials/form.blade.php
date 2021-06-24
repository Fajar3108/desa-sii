@csrf
<div class="form-group">
    <label for="thumbnail">Thumbnail</label>
    <input type="file" class="form-control" name="thumbnail" id="thumbnail" value="{{ $post->thumbnail }}">
    @error('thumbnail')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="title">Judul</label>
    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ?? $post->title }}">
    @error('title')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="description">Content</label>
    <textarea name="description" id="description" class="form-control">{{ old('description') ?? $post->description }}</textarea>
    @error('description')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="tags">Tags</label>
    <select class="form-control tags-control" multiple="multiple" name="tags[]" id="tags">
        @foreach ($post->tags as $tag)
            <option selected>{{ $tag->slug }}</option>
        @endforeach
    </select>
    @error('tags')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>



