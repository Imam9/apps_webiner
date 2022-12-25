@extends('template.master')
@section('contents')


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
                        <strong>Error! </strong>{{ session()->get('err_message') }}
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
            @foreach ($data['webiner'] as $item)
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
                        {{$item->nama_institusi}} <br>
                       
                        <div class="badge badge-primary">  <b>Kuota Tersisa</b> : {{$item->sisa_slot_peserta}}</div>
                    </p>
                    <div class="article-cta">                           
                        <a href="{{url('ikuti-webiner/'.$item->id_webiner)}}" class="btn btn-primary">Ikuti Kelas</a>
                    </div>
                    </div>
                </article>
                </div>
                
            @endforeach
            
          </div>

    </div>
</section>


@endsection
