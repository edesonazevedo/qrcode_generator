<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>pdf</title>
    <link rel="stylesheet" href="{{ asset('css/style_pdf.css') }}" >
</head>
<body>
    {{-- <h1>PDF GERADO COM SUCESSO</h1> --}}

    <div id="header">
        <p style="padding-top: 20% ">{{ $qrcode->titulo }}</p>
    </div>
    <div id="body">
        <img style="padding-top: 5% " src="{{ asset("storage/qrcodes/{$qrcode->id}.png") }}" alt="">
    </div>
    <div id="footer">
        <p style="padding-top: 20% ">{{ $qrcode->descricao }}</p>
    </div>
</body>
</html>
