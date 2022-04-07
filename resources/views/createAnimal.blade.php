@extends('layouts.app')
@section('content') 
    <div class="container">
        <h3>Registro de um novo animal </h3> 
        @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p> {{$error}} </p>
        @endforeach
            </div>
         @endif
        <form method="POST" action="create" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="pwd">Nome:</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome do animal" required>
            </div>
            <div class="form-group">
                <label for="sel1">Especie:</label>
                <select class="form-control" name="especie_id">
                    @foreach($especies as $especie)
                        <option value = {{$especie->id}}>  {{$especie->nome}} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pwd">Caracteristicas:</label>
                <input type="textarea" class="form-control" name="caracteristicas" placeholder="Escreva caracteristicas animal" required>
            </div>
            <div class="form-group">
                <label for="pwd">Foto:</label>
                <input type="file" class="form-control" name="foto" placeholder="Foto do animal" required>
            </div>
            <input class='btn btn-secondary' type="reset" value="Limpar">
            <input class='btn btn-primary' type="submit" name="submit" value="Enviar">
        </form>
    </div> 
@endsection

