@extends('layouts.app')
@section('content')
    <p>{{ $qrcode->titulo }}</p>
    <p>{{ $qrcode->descricao }}</p>
    <p>{{ $qrcode->conteudo }}</p>
    <p>{{ date('d/m/Y H:i:s',strtotime($qrcode->created_at)) }}</p>

    <a href="{{ route('qrcodes.index') }}" class="btn btn-primary">Voltar</a>
@endsection
