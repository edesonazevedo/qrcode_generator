@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col">
        {{-- <form action="{{ route('qrcodes.update',['qrcode' => $qrcode->id ]) }}" method="POST">
            @csrf
            @method('put')
            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" value="{{ $qrcode->titulo }}"><br>
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo" value="{{ $qrcode->tipo }}"><br>
            <label for="logo">Logo:</label>
            <input type="file" name="logo" id="logo"><br>
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" value="{{ $qrcode->descricao }}"><br>
            <label for="conteudo">Conteudo:</label>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10"> {{ $qrcode->conteudo }}</textarea><br>

            <input type="submit" value="Salvar" class="btn btn-primary">
        </form> --}}

        <form action="{{ route('qrcodes.update',['qrcode' => $qrcode->id ]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" name="titulo" id="titulo" value="{{ $qrcode->titulo }}" required>
            </div>
            {{-- <div class="form-group">
              <label for="tipo">Tipo</label>
              <select class="form-control" name="tipo" id="tipo" required >
                <option value="">Selecionar</option>
                <option>WhatsApp</option>
                <option>E-mail</option>
                <option>SMS</option>
              </select>
            </div> --}}
            <div class="form-group">
                <label for="conteudo">Conteudo</label>
                <input type="text" class="form-control" name="conteudo" id="conteudo" value="{{ $qrcode->conteudo }}" required>
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input name="logo" type="file" class="form-control" id="logo">
            </div>
            <div class="form-group">
                <label for="background">Fundo</label>
                <input name="background" type="file" class="form-control" id="background">
            </div>
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <textarea name="descricao" class="form-control" id="descricao" rows="3">{{ $qrcode->descricao }} </textarea>
            </div>
            <div class="form-group" style="display: flex;justify-content: flex-end;">
              <input type="submit" value="Salvar" class="btn btn-secondary">
            </div>
          </form>
    </div>
</div>
<div class="row">
    <div class="col">
        <a href="{{ route('qrcodes.index') }}" class="btn btn-primary">Voltar</a>
    </div>
</div>
@endsection

