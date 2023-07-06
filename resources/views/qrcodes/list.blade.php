<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de Qrcodes</title>
</head>
<body>
    <a href="{{ route('qrcodes.create') }}">Novo</a>
    <table>
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>CONTEUDO</th>
            <th>AÇÕES</th>
            <th></th>
            <th></th>
        </tr>
        @foreach ($qrcodes as $qrcode)
            <tr>
                <td>{{ $qrcode->id }}</td>
                <td>{{ $qrcode->titulo }}</td>
                <td>{{ $qrcode->descricao }}</td>
                <td>{{ $qrcode->conteudo }}</td>
                <td><a href="{{ route('qrcodes.show',['qrcode' => $qrcode->id ]) }}">VER</a></td>
                <td><a href="{{ route('qrcodes.edit',['qrcode' => $qrcode->id ]) }}">EDITAR</a></td>
                <td>
                    <form action="{{ route('qrcodes.destroy',['qrcode' => $qrcode->id ]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Remover">
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>