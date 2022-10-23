@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="card card-noborder b-radius">
        <div class="card-body">
            <div class="row">
                <div class="col-12 mt-2">
                    @foreach( $settings as $setting)
                    <div class="form-group">
                        <label for="nama_perusahaan">Nama Perusahaan</label>
                        <input disabled type="text" class="form-control" id="nama" name="nama"
                            value="{{ $setting->nama_perusahaan }}">
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input disabled type="text" class="form-control" id="telepon" name="telepon"
                            value="{{ $setting->telepon }}">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input disabled type="text" class="form-control" id="alamat" name="alamat"
                            value="{{ $setting->alamat }}">
                    </div>
                    @endforeach
                    <button type="button" class="float-right btn btn-primary btn" data-toggle="modal"
                        data-target="#form-setting"><i class="fa fa-plus"></i> &nbsp; Edit Mart
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Extra large modal -->
<div class="modal fade bd-example-modal-md" id="form-setting" tabindex="-1" role="dialog"
    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judul">Edit Mart</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('setting.update') }}" method="post" class="form-setting" data-toggle="validator"
                    enctype="multipart/form-data">
                    @csrf
                    @foreach( $settings as $setting)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Perusahaan <span class="text-danger">*</span></label>
                                <input type="text" name="nama_perusahaan" class="form-control" id="nama_perusahaan"
                                    value="{{ old('nama_perusahaan', $setting->nama_perusahaan) }}" required autofocus>
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label>Telepon <span class="text-danger">*</span></label>
                                <input type="number" name="telepon" class="form-control" id="telepon"
                                    value="{{ old('telepon', $setting->telepon) }}" required>
                                <span class="help-block with-errors"></span>
                            </div>
                            <div class="form-group">
                                <label>Alamat <span class="text-danger">*</span></label>
                                <textarea name="alamat" class="form-control" id="alamat" rows="3"
                                    required>{{ old('alamat', $setting->alamat) }}</textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer right-content-between">
                        <button class="btn btn-primary">Save</button>
                        <a class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Back</a>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
    </div>
</div>
@endsection