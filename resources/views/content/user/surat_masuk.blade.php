@extends('template.user.index_user')

@section('content_user')

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
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Nomor Surat</th>
                                    <th class="text-center">Perihal</th>
                                    <th class="text-center">Tanggal Keluar</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>

                                @foreach($keluar as $k)
                                @if ($k->users->id == Auth::user()->id)
                                @php
                                $status = $k->status
                                @endphp
                                <?php
                                $no++;
                                ?>

                                <tr class="text-black">
                                    <td class="text-center">{{ $no }}.</td>
                                    <td>{{$k->no_suratkeluar}}</td>
                                    <td class="text-center">{{$k->perihal_keluar}}</td>
                                    <td class="text-center">{{$k->tgl_keluar}}</td>
                                    <td class="text-center">
                                        
                                        @if($status == 'Sukses')
                                            <button type="button" class="btn btn-secondary btn-sm" disabled><img src="{{asset('asset/check.png')}}"/></button>
                                        @else                               
                                            <a class="btn btn-primary btn-sm" href="surat_masuk_user/approve/{{$k->id}}"><img src="{{asset('asset/check.png')}}"/></a>     
                                        @endif                               
                                        <a class="btn btn-success btn-sm" href="download/{{ $k->id }} " role="button"><img src="{{asset('asset/download.png')}}"/></a>
                                    </td>
                                </tr>
                            </tbody>
                            @endif
                            @endforeach
                        </table>   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection