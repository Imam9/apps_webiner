@extends('template.master')
@section('contents')


<section class="section">
    <div class="section-header">
    <h1>{{$data['title']}}</h1>
    </div>
{{-- 
    <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#myModal">
        <i class="fa fa-plus"></i> Tambah Data
    </button> --}}

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
                <h4>Lengkapi Data Dibawah Ini</h4>
            </div>
            <div class="card-body">
                <form action="{{url('update-lengkapi-institusi')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Institusi</label>
                                <input type="text" name = "nama_institusi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number Institusi</label>
                                <input type="text" name = "phone_number_institusi" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email Institusi</label>
                                <input type="email" name = "email_institusi" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Berdiri</label>
                                <input type="date" name = "tgl_berdiri" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="text-right">
                                <button type = "submit" class="btn btn-primary">Update Lengkapi Insitusi</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>



@endsection
