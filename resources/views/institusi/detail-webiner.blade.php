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

        <?php if(Auth::user()->hak_akses == 'institusi' AND Auth::user()->hak_akses == 'admin'){ ?>

            <div class="card">
                <div class="card-header">
                    <h4>Data Pendaftaran</h4>
                </div>
                <div class="card-body">
                    <table id="myTable2" class="table table-striped table-hover" cellspacing="0" width="100%">
                        <thead >
                            <tr >
                                <th width = "5%">No.</th>
                                <th>Nama Pendaftar</th>
                                <th>Tanggal Daftar</th>
                                <th>Tanggal Absen</th>
                                <th>Email Pendaftar</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no =1; ?>
                            @foreach ($data['peserta'] as $item)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->tgl_pendaftaran}}</td>
                                    <td>{{$item->tgl_absensi}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>
                                        <?php if($item->tgl_absensi == NULL){ ?>
                                            <div class="badge badge-warning">Belum Hadir</div>
                                        <?php }else{ ?>
                                             <div class="badge badge-success">Hadir</div>
                                        <?php } ?>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                </div>
            </div>
        <?php } ?>
    </div>
</section>


@endsection
