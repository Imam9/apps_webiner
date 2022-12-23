
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
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Filter Laporan</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{url('filter-laporan')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Dari Tanggal</label>
                                        <input type="date" name="dari_tanggal" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="">Sampai Tanggal</label>
                                        <input type="date" name="sampai_tanggal" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <button  type = "submit" class="btn btn-primary mt-2">Filter</button>
                                    <button  type = "reset" class="btn btn-danger mt-2">Reset</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                    <div class="card table-responsive">
                        <div class="card-header">
                        <h4>Data Filter Laporan</h4>
                        </div>
                        <div class="card-body">
                            <table id="myTable2" class="table table-striped table-hover" cellspacing="0" width="100%">
                                <thead >
                                    <tr >
                                        <th width = "5%">No.</th>
                                        <th>Nama Buku</th>
                                        <th>Stok Buku</th>
                                        <th>Nama Peminjam</th>
                                        <th>Tanggal Peminjaman</th>
                                        <th>Tanggal Pengembalian</th>
                                        <th>Jumlah</th>
                                        <th>Jumlah Pengembalian</th>
                                        <th>Batas Pengembalian</th>
                                        <th>Status Peminjaman</th>
                                        <th>Nama Petugas</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;?>
                                    @foreach ($data['pengembalian'] as $item)
                                        <tr>
                                            <td>{{$no++}}</td>
                                            <td>{{$item->nama_buku}}</td>
                                            <td>{{$item->stok_buku}}</td>
                                            <td>{{$item->nama_peminjam}}</td>
                                            <td>{{$item->tgl_peminjaman}}</td>
                                            <td>{{$item->tgl_pengembalian}}</td>
                                            <td>{{$item->jml_peminjaman}}</td>
                                            <td>{{$item->jml_pengembalian}}</td>
                                            <td>{{$item->batas_pengembalian}}</td>
                                            <td>{{$item->status_peminjaman}}</td>
                                            <td>{{$item->nama_petugas}}</td>
                                            <td class="text-center">
                                                <a href="{{url('detail-peminjaman/'.$item->id_peminjaman)}}" class="btn btn-info btn-sm"><i class = "fa fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

@endsection