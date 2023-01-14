@extends('template.master')
@section('contents')


<section class="section">
    <div class="section-header">
    <h1>{{$data['title']}}</h1>
    </div>
    <h2 class="section-title">Data Webinar</h2>
    {{-- <p class="section-lead">Data R Terbaru</p> --}}

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
                <form action="<?= url('search-webiner')?>" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Keyword</label>
                                <input type="text" name = "keyword" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Tanggal</label>
                                <input type="date" name = "tanggal" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Kategori</label>
                                <select name="id_kategori" id="" class="form-control">
                                    <option>--Pilih Kategori--</option>
                                    @foreach ($data['kategori'] as $item)
                                        <option value="{{$item->id_kategori}}">{{$item->kategori}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <button type="submit" class="btn btn-primary mt-2">Filter</button>
                        </div>
                        <div class="col-md-1">
                            <br>
                            <a href="{{url('readmore-data-webiner')}}" class="btn btn-danger mt-2">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            @foreach ($data['webiner'] as $item)
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="card author-box card-primary">
                        <div class="card-body">
                            <div class="author-box-left">
                                <img alt="image" src="{{url('webiner/'.$item->gambar_webiner)}}" class="author-box-picture">
                                <div class="clearfix"></div>
                                {{-- <a href="#" class="btn btn-primary mt-3 follow-btn" data-follow-action="alert('follow clicked');" data-unfollow-action="alert('unfollow clicked');">Follow</a> --}}
                            </div>
                            <div class="author-box-details">
                                <div class="author-box-name">
                                    <a href="#">{{$item->nama_webiner}}</a>
                                    <div class="float-right mt-sm-0 mt-3">
                                        <?php if(date('Y-m-d') < $item->tgl_webiner){ ?>
                                            Belum Mulai
                                        <?php }else{ ?>
                                            Sudah Selesai
                                        <?php } ?><br>
                                        <small>
                                            {{$item->kategori}}
                                        </small>
                                    </div>
                                </div>
                                <div class="author-box-job">
                                    {{$item->nama_institusi}} <br>
                                    Tanggal Pelaksanaan : {{$item->tgl_webiner}} <br>
                                    Jam Mulai: {{$item->jam_mulai}} - {{$item->jam_selesai}}
                                </div>
                                <div class="author-box-description">
                                    <p>{{$item->deskripsi_webiner}}</p>
                                    Dibuat Tanggal  : {{$item->created_at}}
                                </div>
                                <div class="mb-2 mt-3"></div>
                                
                                <div class="w-100 d-sm-none"></div>
                                <div class="float-right mt-sm-0 mt-3">
                                    <a href="{{url('detail-webiner/'.$item->id_webiner)}}" class="btn">Detail <i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            @endforeach
            
        </div>

    </div>
</section>


@endsection
