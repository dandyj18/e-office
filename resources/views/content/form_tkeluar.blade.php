@extends('template.index_admin')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Surat</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Surat Keluar</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Tambah Surat Keluar</a></li>
        </ol>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tambah Surat Keluar</h4>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif
                    <div class="basic-form">
                        <form action="tambah_keluar/tambah_keluar_aksi" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="mb-3">
                                    <input type="text" class="form-control input-rounded" name="no_suratkeluar" required="required" placeholder="Nomor Surat">
                                </div>
                                <div class="mb-3">
                                    <select class="custom-select mr-sm-2 rounded" name="users_id" required="required" aria-label="Default select example">
                                        <option disabled selected>Pilih Penerima</option>

                                        @foreach($users as $u)
                                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <input type="text" class="form-control input-rounded" name="perihal_keluar" required="required" placeholder="Perihal">
                                </div>
                                <div class="mb-3">
                                    <input type="date" class="form-control input-rounded" name="tgl_keluar" required="required">
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control-file" name="file_surat" required="required">
                                </div>
                                <div class="mb-3">
                                    <input type="hidden" class="form-control" name="status" required="required" value="Proses">
                                </div>
                                <div class="mb-3">
                                    <span style="float-right">
                                        <input class="btn btn-primary" type="submit" value="Submit" onClick="return confirm('Apakah data yang dimasukkan sudah benar ?')">
                                        <a class="btn btn-success" href="{{route('admin.surat_keluar')}}" role="button">Kembali</a>
                                    </span>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection