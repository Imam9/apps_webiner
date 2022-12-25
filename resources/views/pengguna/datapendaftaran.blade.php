@extends('template.master')
@section('contents')
<?php date_default_timezone_set("Asia/Bangkok"); ?>

<section class="section">
    <div class="section-header">
    <h1>{{$data['title']}}</h1>
    </div>
    <h2 class="section-title">Data Webiner</h2>
    <p class="section-lead">Data Webiner Terbaru</p>
    <div class="row">
        <div class="col-md-12 text-right">
            <a href="">Read More </a>
        </div>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @if (session()->has('err_message'))
                    <div class="alert alert-danger alert-dismissible" role="alert" auto-close="120">
                        <strong>Warning! </strong>{{ session()->get('err_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                @if (session()->has('suc_message'))
                    <div class="alert alert-success alert-dismissible" role="alert" auto-close="120">
                        <strong>Success! </strong>{{ session()->get('suc_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>
        <div class="row">
            @foreach ($data['pendaftaran'] as $item)
                <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article">
                    <div class="article-header">
                    <div class="article-image" data-background="{{url('webiner/'.$item->gambar_webiner)}}">
                    </div>
                    <div class="article-title">
                        <h2><a href="#">{{$item->nama_webiner}}</a></h2>
                    </div>
                    </div>
                    <div class="article-details text-center">
                    <p>Tanggal Pelaksanaan : {{$item->tgl_webiner}} <br> 
                        Waktu : {{$item->jam_mulai}} - {{$item->jam_selesai}} <br>
                        {{$item->nama_institusi}}
                    </p>
                    {{-- <div class="article-cta">                           
                        <a href="{{url('ikuti-webiner/'.$item->id_webiner)}}" class="btn btn-primary">Ikuti Kelas</a>
                    </div> --}}
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{url('detail-webiner/'.$item->id_webiner)}}" class="btn btn-primary" style = "width : 100%"><i class="fa fa-eye"></i> Detail</a>
                        </div>
                        <div class="col-md-6">
                            <?php $tanggal =  $item->tgl_webiner.' '.$item->jam_mulai;  
                            if(strtotime("now") >= strtotime($tanggal) AND $item->tgl_absensi != NULL){ ?>
                                <button type="button" class="btn btn-info" style = "width : 100%" data-toggle="modal" data-target="#Materi{{$item->id_webiner}}">
                                    <i class="fa fa-book"></i> File Materi
                                </button>
                            <?php }else{ ?>
                                <a href="" class="btn btn-info disabled" style = "width : 100%"> File Materi</a>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <?php $tanggal_mulai =  $item->tgl_webiner.' '.$item->jam_mulai;  
                            $tanggal_akhir = $item->tgl_webiner.' '.$item->jam_selesai;
                            if(strtotime("now") >= strtotime($tanggal_mulai) AND strtotime("now") <= strtotime($tanggal_akhir) AND $item->tgl_absensi == NULL ){ ?>
                                <button type="button" class="btn btn-warning" style = "width : 100%" data-toggle="modal" data-target="#Absensi{{$item->id_pendaftaran}}">
                                    <i class="fa fa-book"></i> Absensi
                                </button>
                            <?php }else{ ?>
                                <a href="" class="btn btn-warning disabled" style = "width : 100%">Absensi</a>
                            <?php } ?>

                        </div>
                        <div class="col-md-6">
                            <?php $tanggal_selesai =  $item->tgl_webiner.' '.$item->jam_selesai;  
                            if(strtotime("now") >= strtotime($tanggal_selesai) ){ ?>
                                <button type="button" class="btn btn-danger" style = "width : 100%" data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-file"></i> Sertifikat
                                </button>
                            <?php }else{ ?>
                                <a href="" class="btn btn-danger disabled" style = "width : 100%"> Sertifitkat</a>
                            <?php } ?>
                        </div>
                    </div>
                </article>
                </div>
                
            @endforeach
            
          </div>

    </div>
</section>

@foreach ($data['materi'] as $item)
    <div class="modal fade" id="Materi{{$item->id_webiner}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Data Materi</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body mt-5">
                    <div class="row">
                        <div class="col-md-6">
                            <h6>Nama Materi : {{$item->nama_materi}}</h6>
                        </div>
                        <div class="col-md-6 text-right">
                            <a href="{{asset('materi/'.$item->file_materi)}}" target = "_BLANK" class="btn btn-warning"><i class = "fas fa-download"></i> Download</a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    
@endforeach

@foreach ($data['pendaftaran'] as $item)
    <div class="modal fade" id="Absensi{{$item->id_pendaftaran}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Data Absnsi</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{url('insert-absensi')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="hidden" name = "id_pendaftaran" value = "{{$item->id_pendaftaran}}">
                            <input type="text" name = "name" class="form-control" readonly value = "{{$item->name}}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name = "email" class="form-control" readonly value = "{{$item->email}}">
                        </div>
                        <div class="form-group">
                            <label for="">Absensi</label>
                            <input type="text" readonly class="form-control" value = "Hadir">
                        </div>
                    </div>
    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Absensi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection
