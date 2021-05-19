<div class="form-group">
    <label>No KK</label>
    <input type="number" value="{{ old('number') ?? $family->number }}" name="number" class="form-control" required>
    @error('number')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<br>
