
@extends('template.master')
@section('contents')
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



    <section class="section">
        <div class="section-header">
        <h1>{{$data['title']}}</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="hero bg-primary text-white">
                        <div class="hero-inner">
                        <h2>Welcome Back, {{Auth::user()->name}}!</h2>
                        <p class="lead">Kunjungi Halaman Data Buku Untuk Melihat Buku Buku Yang Ada Di Perpus</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Buku</h4>
                      </div>
                      <div class="card-body">
                        {{$data['jumlah_buku']}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Peminjaman</h4>
                      </div>
                      <div class="card-body">
                        {{$data['jumlah_peminjaman']}}
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                      <i class="fas fa-circle"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4>Data Pengembalian</h4>
                      </div>
                      <div class="card-body">
                        {{$data['jumlah_pengembalian']}}
                      </div>
                    </div>
                  </div>
                </div>                  
              </div>
        </div>
    </section>
</div>


@endsection