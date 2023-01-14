
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
      <div class="row">
        <div class="col-12 mb-4">
            <div class="hero bg-primary text-white">
                <div class="hero-inner">
                <h2>Welcome Back, {{Auth::user()->name}}!</h2>
                <p class="lead">Kelola Perpusatakaan Online ini dengan baik</p>
                </div>
            </div>
        </div>
        
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Data Webinar</h4>
              </div>
              <div class="card-body">
                {{$data['jumlah_data_webiner']}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Data Materi</h4>
              </div>
              <div class="card-body">
                {{$data['jumlah_data_materi']}}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Data Serfikat</h4>
              </div>
              <div class="card-body">
                  {{$data['jumlah_data_sertifikat']}}
              </div>
            </div>
          </div>
        </div>                  
      </div>
        <h2 class="section-title">Dashboard</h2>       
        <div class="row">
          <div class="col-12 col-md-4 col-lg-4">
            <div class="card">
              <div class="card-header">
                <h4>Jumlah Webiner Perbulan</h4>
              </div>
              <div class="card-body">
                <canvas id="JumlahWebiner"></canvas>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 col-lg-4">
            <div class="card">
              <div class="card-header">
                <h4>Jumlah Kategori Webiner</h4>
              </div>
              <div class="card-body">
                <canvas id="JumlahKategoriWebiner"></canvas>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-4 col-lg-4">
            <div class="card">
              <div class="card-header">
                <h4>Profesi Yang Daftar Webiner</h4>
              </div>
              <div class="card-body">
                <canvas id="JumlahProfesi"></canvas>
              </div>
            </div>
          </div>
        </div>

        @foreach ($data['jumlah_webiner'] as $item)
            <?php 
                $bulan[] = $item->bulan;
                $jumlah_webiner[] = $item->jumlah_webiner;
            ?>
        @endforeach


        @foreach ($data['jumlah_kategori'] as $item)
          <?php 
              $kategori[] = $item->kategori;
              $jumlah_kategori[] = $item->jumlah;
          ?>
        @endforeach


        @foreach ($data['jumlah_profesi'] as $item)
          <?php 
              $profesi[] = $item->profesi;
              $jumlah_profesi[] = $item->jumlah;
          ?>
        @endforeach
    </div>
  </section>
</div>
<script>
  var ctx = document.getElementById("JumlahWebiner").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?=json_encode($bulan)?>,
      datasets: [{
        label: '# Jumlah',
        data: {{ json_encode($jumlah_webiner) }},
        backgroundColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });


  var ctx = document.getElementById("JumlahKategoriWebiner").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?=json_encode($kategori)?>,
      datasets: [{
        label: '# Jumlah',
        data: {{ json_encode($jumlah_kategori) }},
        backgroundColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });

  var ctx = document.getElementById("JumlahProfesi").getContext('2d');
  var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: <?=json_encode($profesi)?>,
      datasets: [{
        label: '# Jumlah',
        data: {{ json_encode($jumlah_profesi) }},
        backgroundColor: [
          'rgba(255, 99, 132, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderColor: [
          'rgba(255,99,132,1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true
          }
        }]
      }
    }
  });
</script>
@endsection