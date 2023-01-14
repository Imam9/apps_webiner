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
                            <th>Nama Webinar</th>
                            <th>Tanggal Webinar</th>
                            <th>Jam Mulai</th>
                            <th>Jam Selesai</th>
                            <th>Kuota</th>
                            <th>Jumlah Sertifikat</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($data['webiner'] as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->nama_webiner}}</td>
                                <td>{{$item->tgl_webiner}}</td>
                                <td>{{$item->jam_mulai}}</td>
                                <td>{{$item->jam_selesai}}</td>
                                <td>{{$item->slot_peserta}}</td>
                                <td>{{$item->jumlah_sertifikat}}</td>
                                <td width = "10%" class="text-center">
                                    <a href="{{url('add-sertifikat/'.$item->id_webiner)}}" class="btn btn-info btn-sm"><i class = "fa fa-plus"></i> Sertifikat</a>
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>
>
@endsection
