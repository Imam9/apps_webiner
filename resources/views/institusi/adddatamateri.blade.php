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
            <div class="card-header">
                <h4>Detail Webiner</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Webiner</label>
                            <input type="text" name = "nama_webiner" class="form-control" readonly value = "{{$data['detail']->nama_webiner}}">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Tanggal Webiner</label>
                                    <input type="text" name = "tgl_webiner" class="form-control" readonly value = "{{$data['detail']->tgl_webiner}}">
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jam Mulai</label>
                                    <input type="text" name = "jam_mulai" class="form-control" readonly value = "{{$data['detail']->jam_mulai}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Jam Selesai</label>
                                    <input type="text" name = "jam_selesai" class="form-control" readonly value = "{{$data['detail']->jam_selesai}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Kuota</label>
                                    <input type="text" name = "tgl_selesai" class="form-control" readonly value = "{{$data['detail']->slot_peserta}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Sisa Kuota</label>
                                    <input type="text" name = "jam_selesai" class="form-control" readonly value = "{{$data['detail']->sisa_slot_peserta}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <input type="text" name = "kategori" class="form-control" readonly value = "{{$data['detail']->kategori}}">
                        </div>

                        <div class="form-group">
                            <label for="">Institusi</label>
                            <input type="text" name = "institusi" class="form-control" readonly value = "{{$data['detail']->nama_institusi}}">
                        </div>
                       
                    </div>
                    <div class="col-md-6">
                        <label for="">Gambar Webiner</label>
                        <img src="{{asset('webiner/'.$data['detail']->gambar_webiner)}}" alt="" width="100%">
                      
                        <div class="form-group mt-2">
                            <label for="">Deskripsi</label>
                            <textarea name="deskripsi_webiner" id="" cols="30" rows="10" value = "{{$data['detail']->deskripsi_webiner}}" class="form-control" readonly>{{$data['detail']->deskripsi_webiner}}</textarea>
                        </div>

                        <div class="text-right mt-5">
                            <a href="{{$data['detail']->link_webiner}}" target = "_BLANK" class="btn btn-primary">Join Link</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
            <i class="fa fa-plus"></i> Tambah Data
        </button>

        <div class="card">
            <div class="card-header">
                <h4>Data Materi Webiner</h4>
            </div>
            <div class="card-body">
                <table id="myTable2" class="table table-striped table-hover" cellspacing="0" width="100%">
                    <thead >
                        <tr >
                            <th width = "5%">No.</th>
                            <th>Nama Materi</th>
                            <th>Deskripsi Materi</th>
                            <th>File Materi</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1 ?>
                        @foreach ($data['materi'] as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_materi}}</td>
                                <td>{{$item->deskripsi_materi}}</td>
                                <td><a href="{{asset('materi/'.$item->file_materi)}}" target = "_BLANK">Download</a></td>
                                <td class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Update{{$item->id_materi}}">
                                        <i class="fa fa-edit"></i> 
                                    </button>
                                    <a href="{{url('delete-materi/'.$item->id_materi)}}" class="btn btn-danger btn-sm"><i class = "fa fa-trash"></i></a>
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
            <form action="{{url('insert-materi')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Materi</label>
                        <input type="hidden" name = "id_webiner" value = "{{$data['id_webiner']}}">
                        <input type="text" name = "nama_materi" class="form-control" required>
                    </div>      
                    <div class="form-group">
                        <label for="">Deskripsi Materi</label>
                        <textarea name="deskripsi_materi"  class="form-control" required cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Upload Materi</label>
                        <input type="file" name = "file_materi" class="form-control" required>
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

@foreach ($data['materi'] as $item) 
<div class="modal fade" id="Update{{$item->id_materi}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Update Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('update-materi')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama Materi</label>
                        <input type="hidden" name = "id_materi" value = "{{$item->id_materi}}">
                        <input type="text" name = "nama_materi" class="form-control" value = "{{$item->nama_materi}}" required>
                    </div>      
                    <div class="form-group">
                        <label for="">Deskripsi Materi</label>
                        <textarea name="deskripsi_materi"  class="form-control" required cols="30" rows="10" value = "{{$item->deskripsi_materi}}">{{$item->deskripsi_materi}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Upload Materi</label>
                        <input type="file" name = "file_materi" class="form-control">
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
