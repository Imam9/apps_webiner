@extends('template.master')
@section('contents')


<section class="section">
    <div class="section-header">
    <h1>{{$data['title']}}</h1>
    </div>

    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-plus"></i> Tambah Data
    </button>

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
                            <th>Gambar Buku</th>
                            <th>Penerbit</th>
                            <th>Penulis</th>
                            <th>Stok Buku</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($data['buku'] as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_buku}}</td>
                                <td width="15%"><img src="{{url('buku/'.$item->gambar_buku)}}" alt="" width="100%"></td>
                                <td>{{$item->penerbit}}</td>
                                <td>{{$item->penulis}}</td>
                                <td>{{$item->stok_buku}}</td>
                                <td>{{$item->deskripsi}}</td>
                                <td width = "10%" class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Update{{$item->id_buku}}">
                                        <i class="fa fa-edit"></i> 
                                    </button>
                                    <a href="{{url('delete-buku/'.$item->id_buku)}}" class="btn btn-danger btn-sm"><i class = "fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Tambah Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('insert-buku')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Buku</label>
                        <input type="text" name = "nama_buku" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Penulis</label>
                        <input type="text" name = "penulis" class="form-control" required>
                    </div>   
                    <div class="form-group">
                        <label for="">Penerbit</label>
                        <input type="text" name = "penerbit" class="form-control" required>
                    </div>  
                    <div class="form-group">
                        <label for="">Stok Buku</label>
                        <input type="number" name = "stok_buku" class="form-control" required>
                    </div>   
                    <div class="form-group">
                        <label for="">Gambar Buku</label>
                        <input type="file" name = "gambar" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi"  class="form-control" required cols="30" rows="10"></textarea>
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

@foreach ($data['buku'] as $item)
<div class="modal fade" id="Update{{$item->id_buku}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Update Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('update-buku')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Buku</label>
                        <input type="hidden" name = "id_buku" class="form-control" value="{{$item->id_buku}}">
                        <input type="text" name = "nama_buku" class="form-control" required value = "{{$item->nama_buku}}">
                    </div>
                    <div class="form-group">
                        <label for="">Penulis</label>
                        <input type="text" name = "penulis" class="form-control" required value = "{{$item->penulis}}">
                    </div>   
                    <div class="form-group">
                        <label for="">Penerbit</label>
                        <input type="text" name = "penerbit" class="form-control" required value = "{{$item->penerbit}}">
                    </div>   
                    <div class="form-group">
                        <label for="">Stok Buku</label>
                        <input type="number" name = "stok_buku" class="form-control" required value = "{{$item->stok_buku}}">
                    </div>   
                    <div class="form-group">
                        <label for="">Gambar Buku</label>
                        <input type="file" name = "gambar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea name="deskripsi" id="" class="form-control" required value = "{{$item->deskripsi}}" cols="30" rows="10">{{$item->deskripsi}}</textarea>
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
