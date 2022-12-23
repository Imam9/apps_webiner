
@extends('template.master')
@section('contents')

    <section class="section">
        <div class="section-header">
        <h1>{{$data['title']}}</h1>
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
                @foreach ($data['buku'] as $item)
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <article class="article">
                        <div class="article-header">
                            <div class="article-image" data-background="{{asset('buku/'.$item->gambar_buku)}}">
                            </div>
                            <div class="article-title">
                            <h2><a href="{{url('detail-buku-anggota/'.$item->id_buku)}}">{{$item->nama_buku}}</a></h2>
                            </div>
                        </div>
                        <div class="article-details">
                            <p>{{$item->deskripsi}} </p>
                            <div class="article-cta">
                            <a href="{{url('detail-buku-anggota/'.$item->id_buku)}}" class="btn btn-primary">Detail</a>
                            </div>
                        </div>
                        </article>
                    </div>
                @endforeach
            </div>
        </div>
    </section>


@endsection