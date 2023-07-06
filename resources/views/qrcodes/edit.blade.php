<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Qrcodes</title>
</head>
<body>
    <form action="{{ route('qrcodes.update',['qrcode' => $qrcode->id ]) }}" method="POST">
        @csrf
        @method('put')
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" id="titulo" value="{{ $qrcode->titulo }}"><br>
        <label for="descricao">Descrição:</label>
        <input type="text" name="descricao" id="descricao" value="{{ $qrcode->descricao }}"><br>
        <label for="conteudo">Conteudo:</label>
        <textarea name="conteudo" id="conteudo" cols="30" rows="10"> {{ $qrcode->conteudo }}</textarea><br>

        <input type="submit" value="Salvar">
    </form>
    <a href="{{ route('qrcodes.index') }}">Voltar</a>
</body>
</html>