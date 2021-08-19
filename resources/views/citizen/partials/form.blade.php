<div class="form-group">
    <label>Nama</label>
    <input type="text" value="{{ old('name') ?? $citizen->name }}" name="name" class="form-control" required>
    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>No Handphone</label>
    <input type="text" value="{{ old('no_hp') ?? $citizen->no_hp }}" name="no_hp" class="form-control">
    @error('no_hp')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>NIK</label>
    <input type="text" value="{{ old('nik') ?? $citizen->nik }}" name="nik" class="form-control" required>
    @error('nik')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>NO KK</label>
    <input type="text" value="{{ old('kk') ??  $citizen->family->number }}" name="kk" class="form-control" required>
    @error('kk')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>Tanggal lahir</label>
    <input type="date" value="{{ old('birthday') ?? $citizen->birthday }}" name="birthday" class="form-control" required>
    @error('birthday')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group">
    <label>Jenis kelamin</label>
    <br />
    <label class="fancy-radio">
        <input type="radio" name="gender" value="L" required data-parsley-errors-container="#error-radio" @if(isset($citizen)) {{ $citizen->gender == "L" ? 'checked' : '' }} @endif>
        <span><i></i>Laki - Laki</span>
    </label>
    <label class="fancy-radio">
        <input type="radio" name="gender" value="P" @if(isset($citizen)) {{ $citizen->gender == "P" ? 'checked' : '' }} @endif>
        <span><i></i>Perempuan</span>
    </label>
    @error('gender')
        <p id="error-radio" class="text-danger">{{ $message }}</p>
    @enderror
</div>
<div class="form-group">
    <label>Alamat</label>
    <textarea class="form-control" name="address" rows="5" cols="30" required>{{ old('address') ?? $citizen->address }}</textarea>
    @error('address')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>
<div class="form-group row">
    <div class="col-6">
        <label>RT</label>
        <input type="number" value="{{ old('rt') ?? $citizen->rt }}" name="rt" class="form-control" required>
        @error('rt')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-6">
        <label>RW</label>
        <input type="number" value="{{ old('rw') ?? $citizen->rw }}" name="rw" class="form-control" required>
        @error('rw')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
