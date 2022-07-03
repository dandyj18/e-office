@extends('template.index_admin')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Surat</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Surat Keluar</a></li>
        </ol>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Surat Keluar</h4>
                        <a class="btn btn-primary btn-sm" href="surat_keluar/tambah_keluar" role="button">+ Tambah Surat Keluar</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nomor Surat</th>
                                    <th class="text-center">Penerima</th>
                                    <th class="text-center">Perihal</th>
                                    <th class="text-center">Tanggal Keluar</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>

                                @foreach($keluar as $k)
                                
                                @php
                                $status = $k->status
                                @endphp

                                <?php 
                                $color;

                                if ($k->status == "Proses"){
                                    $color = "badge-danger";
                                }elseif($k->status == "Sukses"){
                                    $color = "badge-success text-white";
                                }
                                $no++;
                                ?>
                                <tr class="text-black">
                                    <td class="text-center">{{ $no }}.</td>
                                    <td>{{$k->no_suratkeluar}}</td>
                                    <td>{{$k->users->name}}</td>
                                    <td class="text-center">{{$k->perihal_keluar}}</td>
                                    <td class="text-center">{{$k->tgl_keluar}}</td>
                                    <td class="text-center"><span class="badge {{$color}} px-2">{{$k -> status}}</span></td>
                                    <td class="text-center">
                                        <span style="float right">
                                            @if($status == 'Sukses')
                                                <button type="button" class="btn btn-secondary btn-sm" disabled><img src="{{asset('asset/edit1.png')}}"/></button>
                                            @else      
                                                <a class="btn btn-warning btn-sm" href="edit/{{$k->id}}" type="button"><img src="{{asset('asset/edit1.png')}}"/></a>
                                            @endif
                                            <a class="btn btn-success btn-sm text-white" href="surat_keluar/download/{{$k->id}}" role="button"><img src="{{asset('asset/download.png')}}"/></a>
                                            <a class="btn btn-danger btn-sm text-white" href="surat_keluar/hapus/{{$k->id}}" role="button"><img src="{{asset('asset/delete.png')}}"/></a>
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