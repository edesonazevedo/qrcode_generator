@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col">
        {{-- <form action="{{ route('qrcodes.store') }}" method="POST" enctype="multipart/form-data">
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
        </form> --}}


        <form  action="{{ route('qrcodes.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="titulo">Titulo</label>
              <input type="text" class="form-control" name="titulo" id="titulo" required>
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
                <input type="text" class="form-control" name="conteudo" id="conteudo" required>
            </div>
            <div class="form-group">
                <label for="logo">Logo</label>
                <input name="logo" type="file" class="form-control" id="logo" required>
            </div>
            <div class="form-group">
                <label for="background">Fundo</label>
                <input name="background" type="file" class="form-control" id="background" required>
            </div>
            <div class="form-group">
              <label for="descricao">Descrição</label>
              <textarea name="descricao" class="form-control" id="descricao" rows="3"></textarea>
            </div>
            <div class="form-group" style="display: flex;justify-content: flex-end;">
              <input type="submit" value="Salvar" class="btn btn-secondary">
            </div>
          </form>
    </div>
</div>
<div class="row mb-3">
    <div class="col">
        <a href="{{ route('qrcodes.index') }}" class="btn btn-primary" >Voltar</a>
    </div>
</div>

@endsection

