
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Sertifikat</title>
    <style>
        html,body{
            height: 100%;
            margin: 0px;
        }

        .background{
            background-image: url('{{ url('sertifikat/'.$detail->gambar_sertifikat)}}');
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .top-title{
            padding-top:{{$detail->top_title}}px;
        }

        .top-nama{
            padding-top : {{$detail->top_nama}}px;
        }

        .top-body{
            padding-top : {{$detail->top_nama}}px;
            padding-left: {{$detail->padding_left}}px;
            padding-right: {{$detail->padding_right}}px;
            font-size: 20px;
            font-family: 'Times New Roman', Times, serif;
        }

        .top-title-ttd{
            padding-top : {{$detail->top_title_ttd}}px;
            
        }

        .top-nama-ttd{
            padding-top : <?= $detail->top_nama_ttd?>px;
        }
    </style>
</head>
<body> 
    <div class="background">
        <center>
            <div class="top-title">
                <h1>Sertifikat</h1>
                <small>No Sertifikat : 89324723894</small>
            </div>
            <div class="top-nama">
                <h1>Diberikan Kepada </h1>
            </div>
            <div class="">
                <h1>Nama Anda</h1>
            </div>
            <div class="top-body">
                Sebagai peserta {{$detail->nama_webiner}} yang di selenggarakan oleh {{$detail->nama_institusi}}, terimakasih atas prestasinya dalam mengikuti kegiatan yang telah kami selenggarakan semoga ilmu yang didapatkan menjadi bermanfaat
            </div>

            <div class="top-title-ttd">
                {{$detail->nama_institusi}}, <?= $detail->tgl_webiner ?>
            </div>  
            <img src="{{url('sertifikat/'.$detail->gambar_ttd)}}" alt="" style = "width:100px">
            <div class="">
                <?= $detail->nama_ttd?>
            </div>
        </center>

        
    </div>
</body>
</html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

{{-- <script>
    window.print()
</script> --}}