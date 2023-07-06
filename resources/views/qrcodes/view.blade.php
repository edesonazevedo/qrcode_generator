<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalhes Qrcodes</title>
</head>
<body>
    <p>{{ $qrcode->titulo }}</p>
    <p>{{ $qrcode->descricao }}</p>
    <p>{{ $qrcode->conteudo }}</p>
    <p>{{ date('d/m/Y H:i:s',strtotime($qrcode->created_at)) }}</p>
 
    <a href="{{ route('qrcodes.index') }}">Voltar</a>
</body>
</html>