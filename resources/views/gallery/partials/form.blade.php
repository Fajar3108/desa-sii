@csrf
<div class="form-group">
    <label for="image">Gambar</label>
    <input type="file" class="form-control" name="image" id="image" value="{{ $gallery->image }}">
    @error('image')
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <label for="catgeory">Kategori</label>
    <select class="form-control" name="category_id" id="category">
        @foreach ($categories as $category)
        <option value="{{ $category->id }}" {{ $gallery->category->id === $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
</div>
