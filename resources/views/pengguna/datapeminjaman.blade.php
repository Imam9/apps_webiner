
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
                    <table id="myTable2" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead >
                            <tr >
                                <th width = "5%">No.</th>
                                <th>Nama Buku</th>
                                <th>Tanggal Peminjaman</th>
                                <th>Jumlah</th>
                                <th>Batas Pengembalian</th>
                                <th>Status Peminjam</th>
                                <th>Nama Peminjam</th>
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
                                    <td>{{$item->tgl_peminjaman}}</td>
                                    <td>{{$item->jml_peminjaman}}</td>
                                    <td>{{$item->batas_pengembalian}}</td>
                                    <td>{{$item->status_peminjaman}}</td>
                                    <td>{{$item->nama_peminjam}}</td>
                                    <td>{{$item->nama_petugas}}</td>
                                    <td>
                                        <?php if($item->status_peminjaman == 'pengajuan pinjaman'){ ?>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Pinjam{{$item->id_peminjaman}}">
                                                <i class="fa fa-edit"></i> 
                                            </button>
                                            <a href="{{url('delete-peminjaman-anggota/'.$item->id_peminjaman)}}" class="btn btn-danger btn-sm"><i class = "fa fa-trash"></i></a>
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
    </section>

<?php $no = 1;?>
@foreach ($data['peminjaman'] as $item)
    <div class="modal fade" id="Pinjam{{$item->id_peminjaman}}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Update Peminjaman Buku</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{url('update-peminjaman-anggota')}}" method="post" enctype="multipart/form-data">
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
                            <label for="">Tanggal Peminjaman</label>
                            <input type="text" name = "tgl_peminjaman" class="form-control" required value = "{{date('Y-m-d H:i:s')}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Peminjaman</label>
                            <input type="number" name = "jml_peminjaman" class="form-control" value = "{{$item->jml_peminjaman}}" required>
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
@endforeach
@endsection