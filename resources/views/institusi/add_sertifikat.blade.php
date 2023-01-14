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
                <h4>Detail Webinar</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Nama Webinar</label>
                            <input type="text" name = "nama_webiner" class="form-control" readonly value = "{{$data['detail']->nama_webiner}}">
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="">Tanggal Webinar</label>
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
                        <label for="">Gambar Webinar</label>
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


       <?php if($data['jumlah_sertifikat'] > 0){ ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add Sertifikat</h4>
                </div>
                <div class="card-body">
                    <table id="myTable2" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead >
                            <tr >
                                <th width = "5%">No.</th>
                                <th>Nama Sertifikat</th>
                                <th>Deksripsi Sertifikat</th>
                                <th>Gambar Sertifikat</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;?>
                            @foreach ($data['sertifikat'] as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->nama_sertifikat}}</td>
                                    <td>{{$item->deskripsi_sertifikat}}</td>
                                    <td width="15%"><img src="{{url('sertifikat/'.$item->gambar_sertifikat)}}" alt="" width="100%"></td>
                                    <td width = "10%" class="text-center">
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#Update{{$item->id_sertifikat}}">
                                            <i class="fa fa-edit"></i> 
                                        </button>
                                        <a href="{{url('cetak-sertifikat/'.$item->id_sertifikat)}}" class="btn btn-warning btn-sm"><i class = "fa fa-print"></i></a>
                                        <a href="{{url('delete-sertifikat/'.$item->id_sertifikat)}}" class="btn btn-danger btn-sm"><i class = "fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
             
                </div>
            </div>                 
       <?php }else{ ?>
            <div class="card">
                <div class="card-header">
                    <h4>Add Sertifikat</h4>
                </div>
                <div class="card-body">
                    <form action="{{url('insert-template-sertifikat')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Nama Sertifikat</label>
                            <input type="hidden" name = "id_webiner" value = "{{$data['id_webiner']}}">
                            <input type="text" name = "nama_sertifikat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Deskripsi Sertifikat</label>
                            <input type="text" name = "deskripsi_sertifikat" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Masukkan Template</label>
                            <input type="file" name = "gambar_sertifikat" class="form-control" required>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>                 
       <?php } ?>                                                                                         
    </div>
</section>


@foreach ($data['sertifikat'] as $item)


<div class="modal fade" id="Update{{$item->id_sertifikat}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Update Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('update-detail-sertifkat')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Top Title Margin</label>
                                <input type="hidden" name = "id_detail_sertifikat" value = "{{$item->id_detail_sertifikat}}">
                                <input type="number" name = "top_title" class="form-control" value = "{{$item->top_title}}" required>
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Top Nama Margin</label>
                                <input type="number" name = "top_nama" class="form-control" value = "{{$item->top_nama}}" required>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Top Body Margin</label>
                                <input type="number" name = "top_body" class="form-control" value = "{{$item->top_body}}" required>
                            </div>   
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Top Margin Title Ttd</label>
                                <input type="number" name = "top_title_ttd" class="form-control" value = "{{$item->top_title_ttd}}" required>
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Top Nama Margin Ttd</label>
                        <input type="number" name = "top_nama_ttd" class="form-control" value = "{{$item->top_nama_ttd}}" required>
                    </div>   
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Padding Right Body</label>
                                <input type="number" name = "padding_right" class="form-control" value = "{{$item->padding_right}}" required>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Padding Left Body</label>
                                <input type="number" name = "padding_left" class="form-control" value = "{{$item->padding_left}}" required>
                            </div> 
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Ttd</label>
                                <input type="text" name = "nama_ttd" class="form-control" value = "{{$item->nama_ttd}}" required>
                            </div> 
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">No Sertifikat</label>
                                <input type="text" name = "no_sertifikat" class="form-control" value = "{{$item->no_sertifikat}}" required>
                            </div>   
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar Ttd</label>
                        <input type="file" name = "gambar_ttd" class="form-control">
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
