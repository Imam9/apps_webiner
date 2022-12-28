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
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telepon</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Alamat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($data['users'] as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->phone_number}}</td>
                                <td>{{$item->jenis_kelamin}}</td>
                                <td>{{$item->tgl_lahir}}</td>
                                <td>{{$item->alamat}}</td>
                                
                            </tr>
                        @endforeach
                        
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>


@endsection
