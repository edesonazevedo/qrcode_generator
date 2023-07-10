@extends('layouts.app')
@section('content')
    {{-- <a href="{{ route('qrcodes.create') }}">Novo</a> --}}
    <div class="row">
        <div class="col" style="display: flex;justify-content:flex-end; color:white" >
            <a href="{{ route('qrcodes.create') }}" id="sidebarCollapse" class="btn btn-info mb-3">
                <i class="fas fa-plus"></i>
                <span>Novo</span>
            </a>
        </div>
    </div>
    <table class="table">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>DESCRIÇÃO</th>
            <th>CONTEUDO</th>
            <th>QRCODE</th>
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
                <td>
                    <a href="{{ url("storage/qrcodes/{$qrcode->id}.png") }}">
                        qrcode
                    </a>
                    <a href="{{ url("storage/{$qrcode->logo}") }}">
                        imgcenter
                    </a>
                </td>
                <td><a href="{{ route('qrcodes.show',['qrcode' => $qrcode->id ]) }}" class="btn btn-info"       style="width: 100%">VER</a></td>
                <td><a href="{{ route('qrcodes.edit',['qrcode' => $qrcode->id ]) }}" class="btn btn-secondary"  style="width: 100%">EDITAR</a></td>
                <td>
                    <form action="{{ route('qrcodes.destroy',['qrcode' => $qrcode->id ]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Remover" class="btn btn-danger" style="width: 100%">
                    </form>
                </td>
            </tr>
        @endforeach
        {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(800)->generate('Make me into an QrCode!')) !!} "> --}}
    </table>
    <script>
        $(document).ready(function() {
            // alert('jquery funcionando')
        })
    </script>
@endsection

