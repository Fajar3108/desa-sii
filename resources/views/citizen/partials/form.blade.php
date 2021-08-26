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
        <label for="rt">RT</label>
        <select name="rt" id="rt" class="form-control" required>
            @for ($i = 1; $i <= 10; $i++)
            <option value="{{ '00' . $i }}" @if($citizen->rt == "00" . $i) selected @endif>
                {{ $i < 10 ? "00" . $i : "0" . $i }}
            </option>
            @endfor
        </select>
        @error('rt')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="col-6">
        <label>RW</label>
        <select name="rw" id="rw" class="form-control" required>
            @for ($i = 1; $i <= 5; $i++)
            <option value="{{ '00' . $i }}" @if($citizen->rw == "00" . $i) selected @endif>
                {{ $i < 10 ? "00" . $i : "0" . $i }}
            </option>
            @endfor
        </select>
        @error('rw')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>
<div class="form-group">
    <label for="status">Status Ekonomi</label>
    <select name="status" id="status" class="form-control" required>
        <option value="mampu" @if($citizen->status == 'mampu') selected @endif>Mampu</option>
        <option value="kurang_mampu" @if($citizen->status == 'kurang_mampu') selected @endif>Kurang Mampu</option>
    </select>
</div>

