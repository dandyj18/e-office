@extends('template.index_admin')

@section('content')

<div class="content">
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Surat Keluar (Keluar)</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $proses }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Surat Keluar (Sukses)</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $sukses }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Surat Masuk</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $masuk }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Karyawan</h3>
                        <div class="d-inline-block">
                            <h2 class="text-white">{{ $karyawan }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection