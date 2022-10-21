@extends('layouts.app')
@section('content')
    <div class="content"> <br>
        <div class="card-header">
            @if(session()->has('bisa'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('bisa') }}
            </div>
            @endif
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">DataTables Example</h3>
                        </div>
                        <div class="card-header">
                            <button type="button" class="btn btn-primary" onclick="getCreateUser()" data-toggle="modal"
                                data-target="#form-user">
                                <i class="nav-icon fas fa-folder-plus"></i> &nbsp; Tambah Data Kelas
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Name</th>
                                <th>Level</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php $no = 1 ?>
                        @foreach($rows as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->level }}</td>
                            <td>{{ $row->email }}</td>
                            <td>
                                <a class="btn-sm btn-primary border-0 p-2" href="{{ route('user.edit', $row) }}">Update</a>
                                <form method="POST" action="{{ route('user.destroy', $row) }}" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn-sm btn-danger border-0 p-2" onclick="return confirm('Yakin Akan Dihapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md" id="form-user" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judul">TAMBAH DATA USER</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if($errors->any())
                @foreach($errors->all() as $err)
                <p class="alert alert-danger">{{ $err }}</p>
                @endforeach
                @endif
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Username <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="username" requiredautofocus />
                            </div>
                            <div class="form-group">
                                <label>Nama User <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="name" requiredautofocus />
                            </div>
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="email" required autofocus />
                            </div>
                            <div class="form-group">
                                <label>Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password" required autofocus />
                            </div>
                            <div class="form-group">
                                <label>Status <span class="text-danger">*</span></label>
                                <select class="form-control" name="level">
                                    <option selected>Pilih Status</option>
                                    @foreach($levels as $key => $val)
                                    @if($key==old('level'))
                                    <option value="{{ $key }}" selected>{{ $val }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $val }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button class="btn btn-primary">Simpan</button>
                            <a class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Kembali</a>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
