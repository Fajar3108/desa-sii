<div class="form-group">
    <label>Nama Kategori</label>
    <input type="text" value="{{ old('name') ?? $category->name }}" name="name" class="form-control" required>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
