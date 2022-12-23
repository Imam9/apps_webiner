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
                            <th>Nama Webiner</th>
                            <th>Gambar Webiner</th>
                            <th>Tanggal Webiner</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Kuota</th>
                            <th>Link Webiner</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($data['webiner'] as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_webiner}}</td>
                                <td width="15%"><img src="{{url('webiner/'.$item->gambar_webiner)}}" alt="" width="100%"></td>
                                <td>{{$item->tgl_webiner}}</td>
                                <td>{{$item->jam_mulai}}</td>
                                <td>{{$item->jam_selesai}}</td>
                                <td>{{$item->slot_peserta}}</td>
                                <td><a href="{{$item->link_webiner}}" target="_BLANK">Link Join</a></td>
                                <td width = "10%" class="text-center">
                                    <a href="{{url('detail-webiner/'.$item->id_webiner)}}" class="btn btn-info btn-sm"><i class = "fa fa-eye"></i></a>
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Update{{$item->id_webiner}}">
                                        <i class="fa fa-edit"></i> 
                                    </button>
                                    <a href="{{url('delete-Webiner/'.$item->id_webiner)}}" class="btn btn-danger btn-sm"><i class = "fa fa-trash"></i></a>
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
            <form action="{{url('insert-webiner')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Webiner</label>
                        <input type="text" name = "nama_webiner" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Tanggal Webiner</label>
                                <input type="date" name = "tgl_webiner" class="form-control" required>
                            </div>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jam Mulai</label>
                                <input type="time" name = "jam_mulai" class="form-control" required>
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jam Selesai</label>
                                <input type="time" name = "jam_selesai" class="form-control" required>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Kuota</label>
                        <input type="number" name = "slot_peserta" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori Webiner</label>
                        <select name="id_kategori" class="form-control" id="" required>
                            <option>--Pilih Kategori--</option>
                            @foreach ($data['kategori'] as $item)
                                <option value="{{$item->id_kategori}}">{{$item->kategori}}</option>
                            @endforeach
                        </select>
                    </div>   
                    <div class="form-group">
                        <label for="">Deskripsi Webiner</label>
                        <textarea name="deskripsi_webiner"  class="form-control" required cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Link Webiner</label>
                        <input type="text" name = "link_webiner" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar Webiner</label>
                        <input type="file" name = "gambar" class="form-control" required>
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

@foreach ($data['webiner'] as $item)


<div class="modal fade" id="Update{{$item->id_webiner}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Update Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('update-webiner')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Webiner</label>
                        <input type="hidden" name = "id_webiner" value = "{{$item->id_webiner}}">
                        <input type="text" name = "nama_webiner" class="form-control" value = "{{$item->nama_webiner}}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Tanggal Webiner</label>
                                <input type="date" name = "tgl_webiner" value = "{{$item->tgl_webiner}}" class="form-control" required>
                            </div>   
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Link Webiner</label>
                        <input type="text" name = "link_webiner" class="form-control" value = "{{$item->link_webiner}}" required>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jam Mulai</label>
                                <input type="time" name = "jam_mulai" class="form-control" value = "{{$item->jam_mulai}}" required>
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Jam Selesai</label>
                                <input type="time" name = "jam_selesai" class="form-control" value = "{{$item->jam_selesai}}" required>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Kuota</label>
                        <input type="number" name = "slot_peserta" class="form-control" value = "{{$item->slot_peserta}}" required>
                    </div>
                    <div class="form-group">
                        <label for="">Deskripsi Webiner</label>
                        <textarea name="deskripsi_webiner" value = "{{$item->deskripsi_webiner}}" class="form-control" required cols="30" rows="10">{{$item->deskripsi_webiner}}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="">Kategori Webiner</label>
                        <select name="id_kategori" class="form-control" id="" required>
                            <option value = "{{$item->id_kategori}}">{{$item->kategori}}</option>
                            @foreach ($data['kategori'] as $item)
                                <option value="{{$item->id_kategori}}">{{$item->kategori}}</option>
                            @endforeach
                        </select>
                    </div>   
                    <div class="form-group">
                        <label for="">Gambar Webiner</label>
                        <input type="file" name = "gambar" class="form-control">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


@endforeach

@endsection
