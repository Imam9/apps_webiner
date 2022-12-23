
@extends('template.master')
@section('contents')

<?php date_default_timezone_set('Asia/Jakarta'); ?>

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
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{asset('buku/'.$data['buku']->gambar_buku)}}" alt="" width = "100%">
                        </div>
                        <div class="col-md-6 text-left">
                            <h5>{{$data['buku']->nama_buku}}</h5>
                            <small>Penerbit : {{$data['buku']->penerbit}}</small><br>
                            <small>Penulis : {{$data['buku']->penulis}}</small>
                            
                            <h6 class="mt-4">Deskripsi</h6>
                            <span>{{$data['buku']->deskripsi}}</span>
                        </div> 
                        <div class="col-md-12 text-right">
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#Pinjam{{$data['buku']->id_buku}}">
                                <i class="fa fa-transaction"></i> Pinjam Buku 
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<div class="modal fade" id="Pinjam{{$data['buku']->id_buku}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Peminjaman Buku</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('insert-peminjaman')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Buku</label>
                        <input type="hidden" name = "id_buku" class="form-control" value="{{$data['buku']->id_buku}}" readonly>
                        <input type="text" name = "nama_buku" class="form-control" required value = "{{$data['buku']->nama_buku}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Stok Buku</label>
                        <input type="text" name = "stok_buku" class="form-control" required value = "{{$data['buku']->stok_buku}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Peminjaman</label>
                        <input type="text" name = "tgl_peminjaman" class="form-control" required value = "{{date('Y-m-d H:i:s')}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Peminjaman</label>
                        <input type="number" name = "jml_peminjaman" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection