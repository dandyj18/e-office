@extends('template.user.index_user')

@section('content_user')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Surat</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Surat Masuk</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Approve Surat Masuk</a></li>
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
                        <form action="{{ url('user/aksi', $keluar->id)}}" method="POST">
                            <fieldset disabled>
                            @csrf
                            <div class="mb-3">
                                <input type="text" id="disabledSelect" class="form-control input-rounded" name="no_suratkeluar" required="required" value="{{ $keluar->no_suratkeluar }}">
                            </div>
                            <div class="mb-3">
                                <input type="text" id="disabledSelect" class="form-control input-rounded" name="perihal_keluar" required="required" value="{{ $keluar->perihal_keluar }}">
                            </div>
                            <div class="mb-3">
                                <input type="date" id="disabledSelect" class="form-control input-rounded" name="tgl_keluar" required="required" value="{{ $keluar->tgl_keluar }}">
                            </div>
                            <div class="mb-3">
                                <input type="hidden" class="form-control" name="status" required="required" value="Sukses">
                            </div>
                            </fieldset>
                            <div class="mb-3">
                                <span style="float-left">
                                    <input class="btn btn-primary" type="submit" value="Submit" onClick="return confirm('Apakah data yang dimasukkan sudah benar ?')">
                                    <a class="btn btn-success text-white" href="{{URL::route('user.surat_masuk_user')}}" role="button">Kembali</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection