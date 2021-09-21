@extends('layout.master')
@section('title', 'Penduduk')

@section('custom-style')
<style>
.text-limitter {
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    max-width: 200px;
}
</style>
@section('content')

<?php
    $search_by_url = request()->search_by ? "&search_by=" . request()->search_by : "";
    $keyword_url = request()->keyword ? "&keyword=" . request()->keyword : "";
    $per_page_url = request()->per_page ? "&per_page=" . request()->per_page : "";
    $order_url = request()->order_by && request()->order_type ? "&order_by=" . request()->order_by . "&order_type=" . request()->order_type : "";
    $filter_url = "&gender=" . (request()->gender ?? "all") . "&status=" . (request()->status ?? "all") . "&rt=" . (request()->rt ?? "all") . "&rw=" . (request()->rw ?? "all");
?>

<div class="row clearfix">
    <div class="col-12 collapse" id="collapseFilter">
        <div class="card m-0 mb-2">
            <div class="header mb-0 pb-0 d-flex justify-content-between">
                <h4 class="m-0">Filter Penduduk</h4>
                <button class="btn btn-danger btn-sm" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter" ><i class="fa fa-close"></i></button>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tr>
                            <th>Jenis Kelamin</th>
                            <td>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-primary @if(!request()->gender || request()->gender == "all") active @endif">
                                        <input type="radio" name="gender" id="all" value="all" @if(!request()->gender || request()->gender == "all") checked @endif>
                                        <i class="fa fa-male"></i>
                                        <i class="fa fa-female mr-1"></i> Semua
                                    </label>
                                    <label class="btn btn-outline-primary @if(request()->gender == "L") active @endif">
                                        <input type="radio" name="gender" id="male" value="L" @if(request()->gender == "L") checked @endif>
                                        <i class="fa fa-male mr-1"></i> Laki - Laki
                                    </label>
                                    <label class="btn btn-outline-primary @if(request()->gender == "P") active @endif">
                                        <input type="radio" name="gender" id="female" value="P" @if(request()->gender == "P") checked @endif>
                                        <i class="fa fa-female mr-1"></i> Perempuan
                                    </label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Status Ekonomi</th>
                            <td>
                                <div class="form-group mb-0">
                                    <select class="form-control" id="status" name="status">
                                        <option value="all">Semua</option>
                                        <option value="mampu" @if(request()->status == "mampu") selected @endif>Mampu</option>
                                        <option value="kurang_mampu" @if(request()->status == "kurang_mampu") selected @endif>Kurang Mamou</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>RT / RW</th>
                            <td>
                                <div class="d-flex m-0">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text bg-white" for="inputGroupSelectRT">RT</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelectRT" name="rt">
                                            <option value="all" @if(!request()->rt || request()->rt == "all") selected  @endif>Semua</option>
                                            @for ($i = 1; $i <= 10; $i++)
                                            <option value="{{ '00' . $i }}" @if(request()->rt == "00" . $i) selected @endif>
                                                {{ $i < 10 ? "00" . $i : "0" . $i }}
                                            </option>
                                            @endfor
                                        </select>
                                    </div>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text bg-white" for="inputGroupSelectRW">RW</label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelectRW" name="rw">
                                            <option value="all"  @if(!request()->rw || request()->rw == "all") selected  @endif>Semua</option>
                                            @for ($i = 1; $i <= 5; $i++)
                                            <option value="{{ '00' . $i }}" @if(request()->rw == "00" . $i) selected @endif>
                                                {{ $i < 10 ? "00" . $i : "0" . $i }}
                                            </option>
                                            @endfor
                                        </select>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <button class="btn btn-primary" id="submitFilter">Terapkan</button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12">
        <div class="card">
            <div class="header pb-2">
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter" title="Filter">
                            <i class="fa fa-filter"></i>
                        </button>
                        <span>
                            <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-sort"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item @if((request()->order_by == "updated_at" && request()->order_type == "DESC") || (!isset(request()->order_by) && !isset(request()->order_type)))) active @endif" href="{{ $citizens->url(1) . $search_by_url . $keyword_url . $per_page_url . $filter_url . "&order_by=updated_at&order_type=DESC" }}">Terakhir diperbarui</a>

                                <a class="dropdown-item @if(request()->order_by == "updated_at" && request()->order_type == "ASC") active @endif" href="{{ $citizens->url(1) . $search_by_url . $keyword_url . $per_page_url . $filter_url . "&order_by=updated_at&order_type=ASC" }}">Terlama</a>

                                <a class="dropdown-item @if(request()->order_by == "name" && request()->order_type == "ASC") active @endif" href="{{ $citizens->url(1) . $search_by_url . $keyword_url . $per_page_url . "&order_by=name&order_type=ASC" }}">Nama ( A - Z )</a>

                                <a class="dropdown-item @if(request()->order_by == "name" && request()->order_type == "DESC") active @endif" href="{{ $citizens->url(1) . $search_by_url . $keyword_url . $per_page_url . $filter_url . "&order_by=name&order_type=DESC" }}">Nama ( Z - A )</a>

                                <a class="dropdown-item @if(request()->order_by == "birthday" && request()->order_type == "DESC") active @endif" href="{{ $citizens->url(1) . $search_by_url . $keyword_url . $per_page_url . $filter_url . "&order_by=birthday&order_type=DESC" }}">Usia Termuda</a>

                                <a class="dropdown-item @if(request()->order_by == "birthday" && request()->order_type == "ASC") active @endif" href="{{ $citizens->url(1) . $search_by_url . $keyword_url . $per_page_url . $filter_url . "&order_by=birthday&order_type=ASC" }}">Usia Tertua</a>
                            </div>
                        </span>

                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-outline-primary"  data-toggle="modal" data-target="#importModal" title="Import"><i class="fa fa-upload"></i></button>

                            <a href="{{ route('citizen.export') }}" class="btn btn-outline-primary" target="_blank" title="Export"><i class="fa fa-download"></i></a>
                        </div>

                        <button type="submit" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Delete All Selected" id="massDelete" disabled><i class="icon-trash"></i></button>

                        <a href="{{ route("citizen.create") }}" class="btn btn-primary" title="Tambah Penduduk"><i class="fa fa-plus"></i></a>
                    </div>
                    <div class="col-6">
                        <form action="{{ route('citizen.index') }}" class="d-flex">
                            <div style="width: 150px" class="input-group input-group-sm">
                                <select name="search_by" id="search_by" class="form-control form-control-sm" aria-describedby="basic-addon1">
                                    <option value="name" @if(request()->search_by == "name") selected @endif>Nama</option>
                                    <option value="no_hp" @if(request()->search_by == "no_hp") selected @endif>No Telp</option>
                                    <option value="nik" @if(request()->search_by == "nik") selected @endif>NIK</option>
                                    <option value="address" @if(request()->search_by == "address") selected @endif>Alamat</option>
                                </select>
                            </div>
                            <div class="input-group input-group-sm mr-1">
                                <input type="text" class="form-control" placeholder="Cari..." aria-describedby="searchButton" name="keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" id="searchButton"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="btn-group mr-1">
                                <button type="button" class="btn btn-sm btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-table mr-1"></i> {{ request()->per_page ?? 10 }}
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item @if(request()->per_page == 10) active @endif" href="{{ $citizens->url(1) . $search_by_url . $keyword_url . $order_url . $filter_url . "&per_page=" . 10 }}">10 Items per Page</a>
                                    @for ( $i = 25; $i <= 100; $i += 25 )
                                    <a class="dropdown-item @if(request()->per_page == $i) active @endif" href="{{ $citizens->url(1) . $search_by_url . $keyword_url . $order_url . $filter_url . "&per_page=" . $i }}">{{$i}} Items per Page</a>
                                    @endfor
                                </div>
                            </div>
                            <a href="{{ route('citizen.index') }}" class="btn btn-sm border-primary d-flex align-items-center" title="Refresh - Reset All Filter"><i class="fa fa-retweet text-primary"></i></a>
                        </form>
                    </div>
                </div>
            </div>
            <div class="body pt-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover m-b-0 c_list">
                        <thead>
                            <tr>
                                <th class="align-middle text-center">
                                    <div class="form-check">
                                        <input type="checkbox" id="selectAll" class="form-check-input position-static">
                                    </div>
                                </th>
                                <th class="align-middle">Nama</th>
                                <th class="align-middle">No Telp</th>
                                <th class="align-middle">Tanggal lahir</th>
                                <th class="align-middle text-center">
                                    <i class="fa fa-male text-primary"></i>
                                    <i class="fa fa-female text-danger"></i>
                                </th>
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
                                    <td class="text-center">
                                        <i class="zmdi"></i>
                                        <div class="form-check">
                                            <input data-id="{{ $citizen->id }}"  type="checkbox" name="ids[]" class="form-check-input check-id position-static">
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-limitter m-0"><a href="{{ route('citizen.show', $citizen->id) }}" class="text-primary">{{ $citizen->name }}</a></p>
                                    </td>
                                    <td>
                                        {{ $citizen->no_hp }}
                                    </td>
                                    <td>
                                        <span><i class="zmdi"></i>{{ date('d M Y' , strtotime($citizen->birthday)) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <span>
                                            <i class="zmdi zmdi-pin"></i>
                                            @if ($citizen->gender == 'L')
                                            <div>
                                                <h5><i class="fa fa-male text-primary" title="Laki-laki"></i></h5>
                                            </div>
                                            @else
                                            <div>
                                                <h5><i class="fa fa-female text-danger" title="Perempuan"></i></h5>
                                            </div>
                                            @endif
                                        </span>
                                    </td>
                                    <td>{{ $citizen->status == 'mampu' ? 'Mampu' : 'Kurang Mampu' }}</td>
                                    <td>
                                        <a href="{{ route('citizen.show', $citizen->id) }}" class="btn btn-primary" title="Show"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('citizen.edit', $citizen->id) }}" class="btn btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-3 d-flex align-items-center justify-content-center">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item @if(!isset(request()->page) || request()->page == 1) disabled @endif"><a class="page-link" href="{{ $citizens->previousPageUrl() . $search_by_url . $keyword_url . $per_page_url . $order_url . $filter_url }}">| <i class="fa fa-arrow-left"></i></a></li>

                            @for ($i = $citizens->currentPage() <= 2 ? 1 : $citizens->currentPage() - 2; $i <= ($citizens->currentPage() + 3 >= $citizens->lastPage() ? $citizens->lastPage() : $citizens->currentPage() + 3); $i++)
                            <li class="page-item @if($citizens->currentPage() == $i) active @endif"><a class="page-link" href="{{ $citizens->url($i) . $search_by_url . $keyword_url . $per_page_url . $order_url . $filter_url }}">{{ $i }}</a></li>
                            @endfor

                            @if ($citizens->currentPage() + 3 < $citizens->lastPage())
                            <li class="page-item disabled"><a href="#" class="page-link">...</a></li>
                            <li class="page-item"><a class="page-link" href="{{ $citizens->url($citizens->lastPage()) . $search_by_url . $keyword_url . $per_page_url . $order_url . $filter_url }}">{{ $citizens->lastPage() }}</a></li>
                            @endif

                            <li class="page-item @if(request()->page == $citizens->lastPage()) disabled @endif"><a class="page-link" href="{{ $citizens->nextPageUrl() . $search_by_url . $keyword_url . $per_page_url . $order_url . $filter_url }}"><i class="fa fa-arrow-right"></i> |</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="importModalLabel">Import Data Penduduk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('citizen.import') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <input type="file" class="form-control" name="file">
                @error('file')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <button class="btn btn-primary btn-block">Submit</button>
        </form>
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
        const filterButton = document.querySelector("#submitFilter");

        filterButton.addEventListener('click', () => {
            // Get Gender
            let gender = "all";
            document.querySelectorAll('[name="gender"]').forEach(el => {
                if (el.checked) {
                    gender = el.value;
                }
            });
            // Get Status Economy
            const status = document.querySelector('[name="status"]').value;
            // Get RT
            const rt = document.querySelector('[name="rt"]').value;
            // Get RW
            const rw = document.querySelector('[name="rw"]').value;

            // Append to URL
            const url = new URL(window.location.href);
            url.searchParams.set('gender', gender);
            url.searchParams.set('status', status);
            url.searchParams.set('rt', rt);
            url.searchParams.set('rw', rw);

            window.location.href = url.href;
        });


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
            deleteButton.disabled = false;
        }


        // DISABLE MASS DELETE BUTTON
        const disableDeleteButton = () => {
            const deleteButton  = getButtonElmnts().get('massDelete');
            deleteButton.disabled = true;
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
