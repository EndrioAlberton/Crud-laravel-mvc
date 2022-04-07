@extends('layouts.app')

@section('content') 
<body>
    <div class="container">
        <h3>Editar registo do animal</h3> 
        @if(isset($errors) && count($errors) > 0)
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p> {{$error}} </p>
        @endforeach
            </div>
         @endif
        <form method='POST' action='../update/{{$animal->id}}' enctype='multipart/form-data'>
            @csrf
            <div class="form-group">
                <label for="pwd">Nome:</label>
                <input type='text' class='form-control' name='nome' value='{{$animal->nome}}' required>
            </div>
            <div class="form-group">
                <label for="sel1">Especie:</label>
                <select class="form-control" name="especie_id">
                    @foreach($especies as $especie)
                        @if($especie->id == $animal->especie_id)
                            <option value = {{$especie->id}} selected> {{$especie->nome}} </option>
                        @else 
                            <option value = {{$especie->id}}> {{$especie->nome}} </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="pwd">Caracteristicas:</label>
                <input type='textarea' class='form-control' name='caracteristicas' value='{{$animal->caracteristicas}}' required>
            </div> 
            <div class="form-group">
                <label for="pwd">Foto:</label>
                <input type="file" class="form-control" name="foto" value='{{$animal->foto}}' required>
            </div>
            <input class='btn btn-secondary' type="reset" value="Limpar">
            <input class='btn btn-primary' type="submit" name="submit" value="Enviar">
        </form>

    </div>
</body>

</html> 
@endsection
