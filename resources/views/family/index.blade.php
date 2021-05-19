@extends('layout.master')
@section('title', 'Keluarga')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h2>Daftar Keluarga</h2>
                    </div>
                    <div class="col-6 text-right">
                        <a href="{{ route("family.create") }}" class="btn btn-primary btn-sm">Tambah</a>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive" id="family-table">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                            <tr>
                                <th>Nomor KK</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($families as $family)
                                <tr>
                                    <td>
                                        {{ $family->number }}
                                    </td>

                                    <td>
                                        <form action="{{ route("family.destroy", $family->id) }}" method="POST" class="mb-0">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" class="btn btn-success" title="Show" onclick="showFamily(event, {{ $family->citizens }})" data-toggle="modal" data-target="#familyMember"><i class="fa fa-eye"></i></button>

                                            <a href="{{ route('family.edit', $family->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>

                                            <button type="submit" class="btn btn-danger" title="Delete" onclick="handler(event)"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $families->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="familyMember" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="familyMemberLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="familyMemberLabel">Keluarga</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body table-responsive">
            <table id="member-table" class="table">

            </table>
        </div>
        </div>
    </div>
    </div>

</div>

@stop

@section('page-script')

    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop

<script>
    const months = [
        'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    ]

    const showFamily = (e, citizens) => {
        const table = document.querySelector("#member-table");
        let tableContent = `
            <tr>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
            </tr>
        `;

        citizens.map((citizen) => {
            const d = new Date(citizen.birthday);
            tableContent += `
                <tr>
                    <td>${citizen.name}</td>
                    <td>${d.getDate()} ${months[d.getMonth()]} ${d.getFullYear()}</td>
                    <td>${citizen.address}</td>
                </tr>
            `;
        });

        table.innerHTML = tableContent;
    }

    function handler(e) {
        const result = confirm('Apa anda yakin ? semua penduduk dengan no kk ini akan ikut terhapus!');

        if (!result) {
            e.preventDefault();
        }
    }
</script>
