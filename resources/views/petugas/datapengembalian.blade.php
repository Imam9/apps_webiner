
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
                    <div class="card table-responsive">
                        <div class="card-header">
                        <h4>Data Peminjaman</h4>
                        </div>
                        <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Dikembalikan</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Dipinjam</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <table id="myTable2" class="table table-striped table-hover" cellspacing="0" width="100%">
                                    <thead >
                                        <tr >
                                            <th width = "5%">No.</th>
                                            <th>Nama Buku</th>
                                            <th>Stok Buku</th>
                                            <th>Nama Peminjam</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Jumlah</th>
                                            <th>Batas Pengembalian</th>
                                            <th>Status Peminjam</th>
                                            <th>Nama Petugas</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;?>
                                        @foreach ($data['peminjaman'] as $item)
                                            <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$item->nama_buku}}</td>
                                                <td>{{$item->stok_buku}}</td>
                                                <td>{{$item->nama_peminjam}}</td>
                                                <td>{{$item->tgl_peminjaman}}</td>
                                                <td>{{$item->jml_peminjaman}}</td>
                                                <td>{{$item->batas_pengembalian}}</td>
                                                <td><div class="badge badge-warning">{{$item->status_peminjaman}}</div></td>
                                                <td>{{$item->nama_petugas}}</td>
                                                <td class="text-center">
                                                    <?php if($item->status_peminjaman == 'dipinjam'){ ?>
                                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Update{{$item->id_peminjaman}}">
                                                            <i class="fa fa-edit"></i> 
                                                        </button>
                                                    <?php }else{ ?>
                                                        <a href="{{url('detail-peminjaman/'.$item->id_peminjaman)}}" class="btn btn-info btn-sm"><i class = "fa fa-eye"></i></a>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                           
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>

@foreach ($data['peminjaman'] as $item)
    <div class="modal fade" id="Update{{$item->id_peminjaman}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Pengembalian Buku</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{url('pengembalian-buku')}}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Buku</label>
                            <input type="hidden" name = "id_buku" class="form-control" value="{{$item->id_buku}}" readonly>
                            <input type="hidden" name = "id_peminjaman" class="form-control" value="{{$item->id_peminjaman}}" readonly>
                            <input type="text" name = "nama_buku" class="form-control" required value = "{{$item->nama_buku}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Stok Buku</label>
                            <input type="text" name = "stok_buku" class="form-control" required value = "{{$item->stok_buku}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Peminjaman</label>
                            <input type="number" name = "jml_peminjaman" class="form-control" required readonly value = "{{$item->jml_peminjaman}}">
                        </div>
                        <div class="form-group">
                            <label for="">Batas Pengembalian</label>
                            <input type="date" name = "batas_pengembalian" class="form-control" required readonly value = "{{$item->batas_pengembalian}}">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Pengembalian</label>
                            <input type="text" name = "tgl_pengembalian" class="form-control" value = "{{date('Y-m-d H:i:s')}}" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Pengembalian</label>
                            <input type="number" name = "jml_pengembalian" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Pengembalian</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection