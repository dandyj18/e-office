@extends('template.index_admin')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Surat</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Surat Masuk</a></li>
        </ol>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Surat Masuk</h4>
                        <a class="btn btn-primary btn-sm" href="surat_masuk/tambah_masuk" role="button">+ Tambah Surat Masuk</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nomor Surat</th>
                                    <th class="text-center">Pengirim</th>
                                    <th class="text-center">Perihal</th>
                                    <th class="text-center">Tanggal Surat</th>
                                    <th class="text-center">Tanggal Masuk</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>

                                @foreach($masuk as $m)

                                <?php 
                                $no++;
                                ?>
                                <tr class="text-black">
                                    <td class="text-center">{{ $no }}.</td>
                                    <td>{{$m->no_surat}}</td>
                                    <td>{{$m->pengirim}}</td>
                                    <td class="text-center">{{$m->perihal}}</td>
                                    <td class="text-center">{{$m->tgl_surat}}</td>
                                    <td class="text-center">{{$m->tgl_masuk}}</td>
                                    <td class="text-center">
                                        <span style="float right">     
                                            <a class="btn btn-warning btn-sm" href="surat_masuk/edit_masuk/{{$m->id}}" type="button"><img src="{{asset('asset/edit1.png')}}"/></a>
                                            <a class="btn btn-success btn-sm text-white" href="surat_masuk/download/{{$m->id}}" role="button"><img src="{{asset('asset/download.png')}}"/></a>
                                            <a class="btn btn-danger btn-sm text-white" href="surat_masuk/hapus/{{$m->id}}" role="button"><img src="{{asset('asset/delete.png')}}"/></a>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection