@extends('layouts.app')

@section('content')  
<body>
  <div class = "container align-self-center">
    <h1 class="text-center"> Listagem dos animais registrados </h1>
    <div class="container-md d-flex justify-content-center">
        <tbody> 
          @foreach($animais as $animal) 
          <div class="card" style="width: 20rem; higth: 15rem"> 
            <img class="card-img-top" src="{{asset("storage/{$animal->foto}") }}" alt="{{$animal->foto}}" style="width: 100%;heigth: 15rem;">
              <div class="card-body">
                <h5 class="card-title">Nome: {{$animal->nome}} </h5>
                <h6 class="card-subtitle mb-2 text-muted">Especie: {{$animal->especie_id}} </h6>
                <p class="card-text"> {{$animal->caracteristicas}} </p>
                <td> 
                  <a  
                    href='edit/{{$animal->id}}'>   
                    <span class="material-icons"> create </span>  
                    Editar  
                  </a>  
              </td> <br>
                <td>  
                  <a  
                    href='destroy/{{$animal->id}}'>
                    <span class="material-icons"> delete </span>  
                    Apagar   
                  </a>  
                </td> 
              </div>
          </div>  
          @endforeach      
        </tbody>
      </table> 
    </div>   
    <div class="container d-flex justify-content-between">  
      <a href='create'>
        <span class="material-icons">
        add_box</span> 
        Adicionar um novo animal
      </a> 
      {!! $animais->links() !!}  
    </div> 
  </div> 
</div> 
</body> 
@endsection
