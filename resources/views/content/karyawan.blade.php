@extends('template.index_admin')

@section('content')

<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Karyawan</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Karyawan</a></li>
        </ol>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4>Data Karyawan</h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nama Karyawan</th>
                                    <th class="text-center">Jabatan</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Alamat</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>

                                @foreach($karyawan as $ka)
                                
                                @php
                                $status = $ka->status
                                @endphp

                                <?php 
                                $no++;
                                ?>
                                <tr class="text-black">
                                    <td class="text-center">{{ $no }}.</td>
                                    <td>{{$ka->nama_karyawan}}</td>
                                    <td class="text-center">{{$ka->jabatan}}</td>
                                    <td class="text-center">{{$ka->jenis_kelamin}}</td>
                                    <td>{{$ka->alamat_karyawan}}</td>
                                    <td class="text-center">
                                        <span style="float right">     
                                            <a class="btn btn-warning btn-sm" href="data-karyawan/edit_karyawan/{{$ka->id}}" type="button"><img src="{{asset('asset/edit1.png')}}"/></a>
                                            <a class="btn btn-danger btn-sm text-white" href="data-karyawan/hapus/{{$ka->id}}" role="button"><img src="{{asset('asset/delete.png')}}"/></a>
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