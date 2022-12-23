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
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Buku</label>
                            <input type="text" name = "nama_buku" class="form-control" readonly value = "{{$data['detail']->nama_buku}}">
                        </div>
                        <div class="form-group">
                            <label for="">Penebit</label>
                            <input type="text" name = "penerbit" class="form-control" readonly value = "{{$data['detail']->penerbit}}">
                        </div>
                        <div class="form-group">
                            <label for="">Penulis</label>
                            <input type="text" name = "penulis" class="form-control" readonly value = "{{$data['detail']->penulis}}">
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Peminjaman</label>
                            <input type="text" name = "jml_peminjaman" class="form-control" readonly value = "{{$data['detail']->jml_peminjaman}}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Peminjaman</label>
                            <input type="text" name = "tgl_peminjaman" class="form-control" readonly value = "{{$data['detail']->tgl_peminjaman}}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pengembalian</label>
                            <input type="text" name = "tgl_pengembalian" class="form-control" readonly value = "{{$data['detail']->tgl_pengembalian}}">
                        </div>
                        <div class="form-group">
                            <label for="">Status Peminjaman</label>
                            <input type="text" name = "status_peminjaman" class="form-control" readonly value = "{{$data['detail']->status_peminjaman}}">
                        </div>
                      
                    </div>
                    <div class="col-md-6">
                        <h6>Gambar Buku</h6>
                        <div class="text-center">
                            <img src="{{asset('buku/'.$data['detail']->gambar_buku)}}" width="100%" alt="">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Jumlah Pengembalian</label>
                            <input type="text" name = "jml_pengembalian" class="form-control" readonly value = "{{$data['detail']->jml_pengembalian}}">
                        </div>
                    </div>

                    
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
