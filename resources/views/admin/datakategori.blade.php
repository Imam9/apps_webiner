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
                            <th>Kategori</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;?>
                        @foreach ($data['kategori'] as $item)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$item->kategori}}</td>
                                <td width = "10%" class="text-center">
                                    <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Update{{$item->id_kategori}}">
                                        <i class="fa fa-edit"></i> 
                                    </button>
                                    <a href="{{url('delete-kategori/'.$item->id_kategori)}}" class="btn btn-danger btn-sm"><i class = "fa fa-trash"></i></a>
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
            <form action="{{url('insert-kategori')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name = "kategori" class="form-control" required>
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

@foreach ($data['kategori'] as $item)


<div class="modal fade" id="Update{{$item->id_kategori}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title">Update Data</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <form action="{{url('update-kategori')}}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="hidden" name = "id_kategori" value = "{{$item->id_kategori}}">
                        <input type="text" name = "kategori" class="form-control" value = "{{$item->kategori}}" required>
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
