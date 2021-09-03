@extends('layout.master')
@section('title', 'Penduduk')

@section('custom-style')
<style>
.alamat {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    max-width: 500px;
}
</style>

@section('content')

<?php
    $search_by_url = request()->search_by ? "&search_by=" . request()->search_by : "";
    $keyword_url = request()->keyword ? "&keyword=" . request()->keyword : "";
    $per_page_url = request()->per_page ? "&per_page=" . request()->per_page : "";
?>

<div class="row clearfix">
    <div class="col-12">
        <form action="{{ route('citizen.index') }}">
            <div class="d-flex">
                <div style="width: 150px">
                    <select name="search_by" id="search_by" class="form-control" aria-describedby="basic-addon1">
                        <option value="name" @if(request()->search_by == "name") selected @endif>Nama</option>
                        <option value="no_hp" @if(request()->search_by == "no_hp") selected @endif>No Telp</option>
                        <option value="nik" @if(request()->search_by == "nik") selected @endif>NIK</option>
                        <option value="address" @if(request()->search_by == "address") selected @endif>Alamat</option>
                        <option value="rt">RT</option>
                        <option value="rw">RW</option>
                        <option value="gender">Jenis Kelamin (L/P)</option>
                        <option value="status">Status Ekonomi ( Mampu / Kurang Mampu )</option>
                    </select>
                </div>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari penduduk disini..." aria-describedby="searchButton" name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-outline-primary" type="submit" id="searchButton">Search</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-6">
                        <div class="dropdown">
                            <button class="btn btn-light border border-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ request()->per_page ?? 10 }} Items Per Page
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item @if(request()->per_page == 10) active @endif" href="{{ $citizens->url(1) . $search_by_url . $keyword_url . "&per_page=" . 10 }}">10</a>
                                @for ( $i = 25; $i <= 100; $i += 25 )
                                <a class="dropdown-item @if(request()->per_page == $i) active @endif" href="{{ $citizens->url(1) . $search_by_url . $keyword_url . "&per_page=" . $i }}">{{$i}}</a>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="col-6 text-right d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger btn-sm disabled mr-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete All Selected" id="massDelete"><i class="icon-trash"></i></button>
                        <a href="{{ route("citizen.create") }}" class="btn btn-primary btn-sm">Tambah</a>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button class="btn btn-outline-success btn-sm ml-1">Import</button>
                            <a href="{{ route('citizen.export') }}" class="btn btn-outline-success btn-sm" target="_blank">Export</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                            <tr>
                                <th class="align-middle">
                                    <div class="form-check">
                                        <input type="checkbox" id="selectAll" class="form-check-input position-static">
                                    </div>
                                </th>
                                <th class="align-middle">Nama</th>
                                <th class="align-middle">No Telp</th>
                                <th class="align-middle">Tanggal lahir</th>
                                <th class="align-middle">Alamat</th>
                                <th class="align-middle">RT/RW</th>
                                <th class="align-middle">Jenis kelamin</th>
                                <th class="align-middle">Status Ekonomi</th>
                                <th class="align-middle">Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @if ($citizens->count() <= 0)
                                <tr><td colspan="9" class="h2 p-4 text-center m-0">Not Found</td></tr>
                                @endif
                                @foreach ($citizens as $citizen)
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <input data-id="{{ $citizen->id }}"  type="checkbox" name="ids[]" class="form-check-input check-id position-static">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('citizen.show', $citizen->id) }}">{{ $citizen->name }}</a>
                                    </td>
                                    <td>
                                        {{ $citizen->no_hp }}
                                    </td>
                                    <td>
                                        <span><i class="zmdi"></i>{{ date('d M Y' , strtotime($citizen->birthday)) }}</span>
                                    </td>
                                    <td>
                                        <p class="alamat"><i class="zmdi"></i>{{ $citizen->address }}</p>
                                    </td>
                                    <td>
                                        <span><i class="zmdi"></i>{{ $citizen->rt }}/{{ $citizen->rw }}</span>
                                    </td>
                                    <td>
                                        <span><i class="zmdi zmdi-pin"></i>{{ $citizen->gender == 'L' ? 'Laki - laki' : 'Perempuan' }}</span>
                                    </td>
                                    <td>{{ $citizen->status == 'mampu' ? 'Mampu' : 'Kurang Mampu' }}</td>
                                    <td>

                                        <form action="{{ route("citizen.destroy", $citizen->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <a href="{{ route('citizen.show', $citizen->id) }}" class="btn btn-success" title="Show"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('citizen.edit', $citizen->id) }}" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>

                                            <button type="submit" class="btn btn-danger" title="Delete"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="{{ $citizens->previousPageUrl() }}">Previous</a></li>
                            @for ($i = $citizens->currentPage() == 1 ? $citizens->currentPage() : $citizens->currentPage() - 1; $i <= ($citizens->currentPage() + 3 >= $citizens->lastPage() ? $citizens->lastPage() : $citizens->currentPage() + 3); $i++)
                            <li class="page-item @if($citizens->currentPage() == $i) active @endif"><a class="page-link" href="{{ $citizens->url($i) . $search_by_url . $keyword_url . $per_page_url }}">{{ $i }}</a></li>
                            @endfor
                            <li class="page-item"><a class="page-link" href="{{ $citizens->nextPageUrl() }}">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

</div>

@stop

@section('page-script')

    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop

@section('custom-scripts')
    <script>
        const customSelector = {
            first(selector) {
                return document.querySelector(selector);
            },


            all(selector) {
                return document.querySelectorAll(selector);
            },
        };

        // GET ALL BUTTON ELEMENTS
        const getButtonElmnts = () => {
            return new Map([
                ['massDelete', customSelector.first('#massDelete')]
            ]);
        };


        // GET DELETE CHECKBOX ELEMENTS
        const getDeleteCheckboxElmnts = () => {
            const slectAllCheckbox  = customSelector.first('#selectAll');
            const checkboxes        = new Set(customSelector.all('.check-id'));

            return new Map([
                ['selectAllCheckbox', slectAllCheckbox],
                ['checkboxes', checkboxes]
            ]);
        };


        // GET CHECKED DELETE CHECKBOXES
        const getDeleteCheckboxCheckedId = () => {
            const checkboxes = getDeleteCheckboxElmnts().get('checkboxes');
            const result     = new Set();

            checkboxes.forEach(item => {
                if(item.checked) result.add(item.dataset.id);
            });

            return result;
        };


        // VALIDATION HAVE A CHECKED CHECKBOX
        const haveAChecked = (checkboxes) => {
            const elmnts = [...checkboxes];
            return elmnts.some(elmnt => elmnt.checked);
        };


        // VALIDATION OF ALL CHECKBOXES CHECKED
        const isAllDeleteCheckboxChecked = () => {
            const checkboxes = [...getDeleteCheckboxElmnts().get('checkboxes')];
            return checkboxes.every(item => item.checked);
        };


        // ACTIVE MASS DELETE BUTTON
        const activateDeleteButton = () => {
            const deleteButton  = getButtonElmnts().get('massDelete');
            deleteButton.classList.remove('disabled');
        }


        // DISABLE MASS DELETE BUTTON
        const disableDeleteButton = () => {
            const deleteButton  = getButtonElmnts().get('massDelete');
            deleteButton.classList.remove('disabled');
            deleteButton.classList.add('disabled');
        }


        // REQUEST TO ACTIVE MASS DELETE BUTTON
        const requestActivateDeleteButton = () => {
            const checkboxes    = getDeleteCheckboxElmnts().get('checkboxes');

            if(haveAChecked(checkboxes)) {
                activateDeleteButton();
                return true;
            }

            disableDeleteButton();
            return false;
        };


        // MASS DELETE BUTTON CLICK HANDLER
        const massDeleteButtonClickHandler = async (event) => {
            const checkedId = [...getDeleteCheckboxCheckedId()];
            const confirm   = window.confirm('Are you sure?');

            if(!confirm) return;

            try {
                const endpoint  = `/api/citizens`;
                const request   = new Request(endpoint, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'Allow-Access-Control-Credentials': true,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({ "ids": checkedId })
                });
                const response  = await fetch(request);
                const resJson   = await response.json();

                if(response.status !== 200) throw 'Failed';

                window.location.reload();

            } catch(err) {
                console.log(err);
            }
        };


        // SELECT ALL DELETE CHECKBOX CLICK HANDLER
        const selectAllDeleteCheckboxClickHandler = (event) => {
        const { target }  = event;
        const checkboxes  = getDeleteCheckboxElmnts().get('checkboxes');
        const itemChecked = target.checked ? true : false;

        checkboxes.forEach(item => item.checked = itemChecked);
            requestActivateDeleteButton();
        }


        // DELETE CHECKBOX CLICK HANDLER
        const deleteCheckboxClickHandler = (event) => {
            const selectAllCheckbox = getDeleteCheckboxElmnts().get('selectAllCheckbox');

            if(isAllDeleteCheckboxChecked()) selectAllCheckbox.checked = true;
            else selectAllCheckbox.checked = false;

            requestActivateDeleteButton();
        };


        // INITIALIZE
        const massDeleteButton  = getButtonElmnts().get('massDelete');
        const selectAllCheckbox = getDeleteCheckboxElmnts().get('selectAllCheckbox');
        const deleteCheckboxes  = getDeleteCheckboxElmnts().get('checkboxes');

        massDeleteButton.addEventListener('click', massDeleteButtonClickHandler);
        selectAllCheckbox.addEventListener('click', selectAllDeleteCheckboxClickHandler);
        deleteCheckboxes.forEach(item => {
        item.addEventListener('click', deleteCheckboxClickHandler);
        });
    </script>
@stop
