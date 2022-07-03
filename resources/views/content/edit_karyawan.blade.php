@extends('template.index_admin')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Karyawan</a></li>
            <li class="breadcrumb-item"><a href="javascript:void(0)">Data Karyawan</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit Data Karyawan</a></li>
        </ol>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Edit Data Karyawan</h4>
                    @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                        {{ $error }} <br/>
                        @endforeach
                    </div>
                    @endif
                    <div class="basic-form">
                        <form action="{{ url('admin/data-karyawan/update', $karyawan->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="mb-3">
                                    <label class="form-label">Nama Karyawan</label>
                                    <input type="text" class="form-control input-rounded" name="nama_karyawan" required="required"  value="{{ $karyawan->nama_karyawan }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Jabatan</label>
                                    <input type="text" class="form-control input-rounded" name="jabatan" required="required"  value="{{ $karyawan->jabatan }}">
                                </div>
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="jenis_kelamin">
                                            Jenis Kelamin
                                        </label>
                                        <div class="form-check">
                                            <input type="radio" name="jenis_kelamin" class="form-check-input" id="jenis_kelamin" value="Laki-Laki" {{$karyawan->jenis_kelamin == 'Laki-Laki'? 'checked' : ''}}>
                                            <label for="jkL" class="form-check-label">
                                                Laki - Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" name="jenis_kelamin" class="form-check-input" id="jenis_kelamin" value="Perempuan" {{$karyawan->jenis_kelamin == 'Perempuan'? 'checked' : ''}}>
                                            <label for="jkP" class="form-check-label">
                                                Perempuan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Alamat Karyawan</label>
                                    <textarea id="alamat_karyawan" name="alamat_karyawan" class="form-control h-150px" required rows="6">{{ $karyawan->alamat_karyawan }}</textarea>
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