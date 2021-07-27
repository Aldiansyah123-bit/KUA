<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Sertifikat</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css">
    .text1{
        font-size:50pt;
        text-align:center;
        font-family:Verdana, Geneva, Tahoma, sans-serif;
    }
    .text2{
        font-size: 30pt;
        text-align:center;
        font-family:'Times New Roman', Times, serif;
    }
    .text3{
        font-size:15pt;
        text-align:center;
        font-family:'Times New Roman', Times, serif;
        color:rgb(31, 139, 4);
    }
</style>
<body>
    @foreach ($nilai as $item)
        @if ($item->nilai>75)
            <p class="text1"><b>SERTIFIKAT</b></p>
            <h2 class="text2">{{auth()->user()->name}}</h2>
            <p class="text3"><b>Dinyatakan Lulus</b></p>
        @endif
    @endforeach
</body>
</html>
