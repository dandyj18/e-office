@extends('template.index_admin')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Surat</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Surat Masuk</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Surat Masuk</a></li>
        </ol>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Surat Masuk</h4>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif
                    <div class="basic-form">
                        <form action="{{ url('admin/surat_masuk/update', $masuk->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="mb-3">
                                    <label class="form-label">Nomor Surat</label>
                                    <input type="text" class="form-control input-rounded" name="no_surat" required="required"  value="{{ $masuk->no_surat }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pengirim</label>
                                    <input type="text" class="form-control input-rounded" name="pengirim" required="required"  value="{{ $masuk->pengirim }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Perihal</label>
                                    <input type="text" class="form-control input-rounded" name="perihal" required="required"  value="{{ $masuk->perihal }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Surat</label>
                                    <input type="date" class="form-control input-rounded" id="date" name="tgl_surat" required="required" value="{{ $masuk->tgl_surat }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Masuk Surat</label>
                                    <input type="date" class="form-control input-rounded" id="date" name="tgl_masuk" required="required" value="{{ $masuk->tgl_masuk }}">
                                </div>
                                <div class="mb-3">
                                    <input type="file" class="form-control-file" name="file_surat" required="required">
                                </div>
                                <div class="mb-3">
                                    <span style="float-right">
                                        <input class="btn btn-primary" type="submit" value="Submit" onClick="return confirm('Apakah data yang dimasukkan sudah benar ?')">
                                        <a class="btn btn-success" href="{{route('admin.surat_masuk')}}" role="button">Kembali</a>
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