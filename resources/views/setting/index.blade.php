@extends('layout.master')
@section('title', 'Pengaturan')


@section('content')

<div class="row clearfix">
    <div class="col-md-12">
        <div class="card">
            <div class="body">
                <form action="{{ route('setting.update', $info->id) }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="form-group">
                        <label for="name">Nama Desa</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ?? $info->name }}">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Profile</label>
                        <textarea class="form-control" name="description" id="description" rows="5">{{ old('description') ?? $info->description }}</textarea>
                        @error('description')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Telepon Desa</label>
                        <input type="text" class="form-control" name="no_hp" id="no_hp" value="{{ old('no_hp') ?? $info->no_hp }}">
                        @error('no_hp')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" value="{{ old('email') ?? $info->email }}">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Alamat</label>
                        <textarea class="form-control" name="address" id="address" rows="5">{{ old('address') ?? $info->address }}</textarea>
                        @error('address')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Hari kerja</label>
                        <div class="row">
                            <div class="col-6">
                                <select class="form-control" name="start_day" id="start_day">
                                    <option value="senin" @if($info->start_day == 'senin') selected @endif>Senin</option>
                                    <option value="selasa" @if($info->start_day == 'selasa') selected @endif>Selasa</option>
                                    <option value="rabu" @if($info->start_day == 'rabu') selected @endif>Rabu</option>
                                    <option value="kamis" @if($info->start_day == 'kamis') selected @endif>Kamis</option>
                                    <option value="jumat" @if($info->start_day == 'jumat') selected @endif>Jumat</option>
                                    <option value="sabtu" @if($info->start_day == 'sabtu') selected @endif>Sabtu</option>
                                    <option value="minggu" @if($info->start_day == 'minggu') selected @endif>Minggu</option>
                                </select>
                                @error('start_day')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <select class="form-control" name="end_day" id="end_day">
                                    <option value="senin" @if($info->end_day == 'senin') selected @endif>Senin</option>
                                    <option value="selasa" @if($info->end_day == 'salasa') selected @endif>Selasa</option>
                                    <option value="rabu" @if($info->end_day == 'rabu') selected @endif>Rabu</option>
                                    <option value="kamis" @if($info->end_day == 'kamis') selected @endif>Kamis</option>
                                    <option value="jumat" @if($info->end_day == 'jumat') selected @endif>Jumat</option>
                                    <option value="sabtu" @if($info->end_day == 'sabtu') selected @endif>Sabtu</option>
                                    <option value="minggu" @if($info->end_day == 'minggu') selected @endif>Minggu</option>
                                </select>
                                @error('end_day')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Jam Kerja</label>
                        <div class="row">
                            <div class="col-6">
                                <input type="time" class="form-control" name="start_time" value="{{ old('start_time') ?? $info->start_time->format('H:i') }}">
                                @error('start_time')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <input type="time" class="form-control" name="end_time" value="{{ old('end_time') ?? $info->end_time->format('H:i') }}">
                                @error('end_time')
                                <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

@stop
