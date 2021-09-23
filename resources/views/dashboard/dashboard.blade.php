@extends('layout.master')
@section('title', 'Dashboard')

@section('custom-style')
<style>
.text-limit {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    max-width: 100%;
}

.desc-limit {
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 100%;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.card-hover{
    transition: .5s;
}

.card-hover:hover {
    transform: scale(1.1);
}
</style>

@section('content')

@php
    $male = App\Models\Citizen::where('gender', 'L')->get()->count();
    $female =  App\Models\Citizen::where('gender', 'P')->get()->count();
    $totalCitizen =  App\Models\Citizen::all()->count();
@endphp

<div class="row clearfix">
    <div class="col-12 row p-0 px-3 mx-auto mb-3">
        <div class="col-md-3 col-sm-6 p-0 pr-md-2 pr-sm-2">
            <div class="card card-hover m-0 mb-1 overflowhidden number-chart">
                <div class="body">
                    <div class="d-flex">
                        <h2><i class="icon-folder-alt text-primary"></i></h2>
                        <div class="pl-3">
                            <div class="number">
                                <span>{{ App\Models\Citizen::get()->count() }}</span>
                            </div>
                            <h6 class="text-muted">Penduduk</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 p-0 pr-md-2 pr-sm-2">
            <div class="card card-hover m-0 mb-1 overflowhidden number-chart">
                <div class="body">
                    <div class="d-flex">
                        <h2><i class="icon-globe text-primary"></i></h2>
                        <div class="pl-3">
                            <div class="number">
                                <span>{{ App\Models\Post::get()->count() }}</span>
                            </div>
                            <h6 class="text-muted">Artikel</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 p-0 pr-md-2 pr-sm-2">
            <div class="card card-hover m-0 mb-1 overflowhidden number-chart">
                <div class="body">
                    <div class="d-flex">
                        <h2><i class="icon-picture text-primary"></i></h2>
                        <div class="pl-3">
                            <div class="number">
                                <span>{{ App\Models\Gallery::get()->count() }}</span>
                            </div>
                            <h6 class="text-muted">Gallery</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 p-0">
            <div class="card card-hover m-0 mb-1 overflowhidden number-chart">
                <div class="body">
                    <div class="d-flex">
                        <h2><i class="icon-heart text-primary"></i></h2>
                        <div class="pl-3">
                            <div class="number">
                                <span>{{ App\Models\Family::get()->count() }}</span>
                            </div>
                            <h6 class="text-muted">Keluarga</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-4 col-sm-6">
        <div class="card text-center">
            <div class="body">
                <h6>Grafik Penduduk (Jenis Kelamin)</h6>
                <div class="sparkline-pie m-t-30"><canvas width="100" height="100" style="display: inline-block; width: 100px; height: 100px; vertical-align: top;" id="genderChart"></canvas></div>
                <div class="stats-report">
                    <div class="stat-item">
                        <h5>Laki - Laki</h5>
                        <b class="col-black">{{ $male * 100 / $totalCitizen }}%</b>
                    </div>
                    <div class="stat-item">
                        <h5>Perempuan</h5>
                        <b class="col-black">{{ $female * 100 / $totalCitizen }}%</b>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8 col-sm-6">
        <div class="card">
            <div class="body">
                <div class="table-responsive">
                    <table class="table m-0 table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th style="width: 50px" class="text-center">
                                        <i class="fa fa-male text-primary"></i><i class="fa fa-female text-danger"></i>
                                </th>
                                <th style="width: 200px">No Telp</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Models\Citizen::select('name', 'gender', 'no_hp')->latest()->take(7)->get() as $item)
                            <tr>
                                <td>{{ $item->name }}</td>
                                <td class="text-center" style="width: 50px">
                                    @if ($item->gender == "L")
                                        <i class="fa fa-male text-primary">
                                    @else
                                        <i class="fa fa-female text-danger">
                                    @endif
                                </td>
                                <td>{{ $item->no_hp }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="3" class="text-center"><a href="{{ route('citizen.index') }}">Lihat Semua</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-7" style="height: 350px">
        @php
            $latestPost = App\Models\Post::latest()->first();
        @endphp
        <a href="{{ route('post.show', $latestPost->id) }}">
            <div class="card bg-dark text-white position-relative">
                <img src="{{ str_contains($latestPost->thumbnail, "http") ? $latestPost->thumbnail : asset("storage/" . $latestPost->thumbnail) }}" class="card-img" alt="..." style="height: 100%; object-fit: cover">
                <div class="card-img-overlay d-flex flex-column justify-content-end" style="background-color: rgba(0,0,0,.3)">
                    <h5 class="card-title text-limit">{{ $latestPost->title }}</h5>
                    <p class="card-text desc-limit">{!! Str::limit($latestPost->description, 150) !!}.</p>
                    <p class="card-text">{{ $latestPost->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </a>
    </div>

    <div class="col-12 col-md-5 mb-4">
        @foreach (App\Models\Post::inRandomOrder()->take(3)->get() as $post)
        <a href="{{ route('post.show', $post->id) }}">
            <div class="card card-hover mb-3">
                <div class="card-body">
                    <div class="d-flex">
                        <img src="{{ str_contains($post->thumbnail, "http") ? $post->thumbnail : asset("storage/" . $post->thumbnail) }}" alt="..." class="rounded" style="width: 50px; height: 50px; object-fit: cover">
                        <div class="card-content col-9">
                            <h5 class="card-title m-0 mb-1 text-limit text-dark">
                            {{ $post->title }}</h5>
                            <p class="card-text"><small class="text-muted">{{ $post->created_at->diffForHumans() }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        @endforeach
        <div class="w-100 text-center">
            <a href="{{ route('post.index') }}">Lihat Semua</a>
        </div>
    </div>
</div>
@stop

@section('custom-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.5.1/chart.min.js" integrity="sha512-Wt1bJGtlnMtGP0dqNFH1xlkLBNpEodaiQ8ZN5JLA5wpc1sUlk/O5uuOMNgvzddzkpvZ9GLyYNa8w2s7rqiTk5Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>

const male = {{ $male }};
const female = {{ $female }};

const labels = [
  'Laki-Laki',
  'Perempuan',
];

const data = {
  labels: labels,
  datasets: [{
    backgroundColor: ['rgb(62, 172, 255)', 'rgb(255, 99, 132)'],
    borderColor: ['rgb(62, 172, 255)', 'rgb(255, 99, 132)'],
    data: [male, female],
  }]
};


const config = {
  type: 'doughnut',
  data: data,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'bottom',
      },
    }
  },
};

const genderChart = new Chart(
    document.querySelector('#genderChart'),
    config
);
</script>
@endsection
