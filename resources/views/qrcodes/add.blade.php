@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        <form action="{{ route('qrcodes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo"><br>
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo"><br>
            <label for="logo">Logo:</label>
            <input type="file" name="logo" id="logo"><br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao"><br>
            <label for="conteudo">Conteudo:</label>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10"></textarea><br>

            <input type="submit" value="Salvar" class="btn btn-primary">
        </form>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <a href="{{ route('qrcodes.index') }}" class="btn btn-primary" >Voltar</a>
    </div>
</div>

@endsection

