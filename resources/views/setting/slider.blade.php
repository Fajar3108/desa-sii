@extends('layout.master')
@section('title', 'Sliders')


@section('content')

<div class="row clearfix" id="slidersTab">
<div class="col-md-12">
    <div class="card">
        <div class="header">
            <div class="row">
                <div class="col-6 d-flex align-items-center">
                    <h2>Sliders</h2>
                </div>
                @if ($sliders->count() < 5)
                <div class="col-6 text-right">
                    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sliderCreateModal">Tambah</button>
                </div>
                @endif
            </div>
        </div>
        <div class="body">
            @if ($sliders->count() <= 0)
            <h4 class="text-center">Upps! Masih Kosong</h4>
            @else
            <div class="row px-3">
                @foreach ($sliders as $slider)
                <div class="card col-md-4 col-12 p-1 m-0 position-relative">
                    <img class="card-img-top" src="{{ str_contains($slider->image, "http") ? $slider->image : asset('storage/' . $slider->image) }}" alt="slider" style="width: 100%; object-fit: cover; height: 200px;">
                    <form action="{{ route('slider.destroy', $slider->id) }}" method="POST" class="position-absolute" style="top: 10px; right: 10px;">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-danger rounded-circle"><h5 style="display: inline">&times;</h5></button>
                    </form>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="sliderCreateModal" tabindex="-1" aria-labelledby="sliderCreateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sliderCreateModalLabel">Add New Slider</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" class="form-control" name="image" required>
                @error('image')
                <small class="text-danger">
                    {{ $message }}
                </small>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>
    function deleteHandler(e) {
        const result = confirm('Apa anda yakin ?');

        if (!result) {
            e.preventDefault();
        }
    }
</script>

@stop
