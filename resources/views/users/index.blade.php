@extends('layout.master')
@section('title', 'Users')

@section('content')
<div class="row clearfix">
    <div class="col-lg-12">
        <div class="card">
            <div class="header">
                <div class="row">
                    <div class="col-6 d-flex align-items-center">
                        <h2>Daftar User</h2>
                    </div>
                    <div class="col-6 text-right">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#userCreateModal">Tambah</button>
                    </div>
                </div>
            </div>
            <div class="body">
                <div class="table-responsive" id="family-table">
                    <table class="table table-hover m-b-0 c_list">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>
                                        {{ $user->name }}
                                    </td>
                                    <td>
                                        {{ $user->username }}
                                    </td>
                                    <td>
                                        {{ $user->email }}
                                    </td>
                                    <td>
                                        <span class="px-4 py-2 border @if($user->role->name == 'admin') border-primary text-primary @else border-warning text-warning @endif" style="border-radius: 100px">
                                            {{ $user->role->name }}
                                        </span>
                                    </td>

                                    <td>
                                        <form action="{{ route("users.destroy", $user->id) }}" method="POST" class="mb-0">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-danger" title="Delete" onclick="handler(event)"><i class="fa fa-trash-o"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                    <div class="mt-3">
                        {{ $users->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="userCreateModal" tabindex="-1" aria-labelledby="userCreateModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userCreateModalLabel">Create New User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Username" name="username" required>
            </div>
            <div class="form-group">
                <input type="email" class="form-control" placeholder="Email" name="email" required>
            </div>
            <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" name="password" required>
            </div>
            <div class="form-group">
                <select name="role" class="form-control">
                    @foreach ((\App\Models\Role::all()) as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

@stop

@section('page-script')

    $('.sparkbar').sparkline('html', { type: 'bar' });

@stop

<script>
    function handler(e) {
        const result = confirm('Apa anda yakin ?');

        if (!result) {
            e.preventDefault();
        }
    }
</script>
