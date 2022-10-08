@extends('admin.admin_master')
 
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <h4>Home Sobre</h4>
                <a href="{{ route('add.sobre') }}">  <button type="button" class="btn btn-info"> editar Sobre </button>  </a>
<br><br>

                <div class="col-md-12">

                    <div class="card">
                      @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success')}}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif

                      <div class="card-header"> Todos Sobre </div>

            <table class="table table-dark table-striped">
    
            <thead>
                <tr>
                    <th scope="col" width="5%">Nº Sobre</th>
                    <th scope="col" width="15%">Sobre Titulo</th>
                    <!--<th scope="col">Caminho Imagem</th> -->
                    <th scope="col" width="25%">texto curto</th>
                    <th scope="col" width="15%">texto longo</th>
                    <th scope="col" width="15%">Action</th>
                </tr>   
            </thead>
            <tbody>
          @php($i = 1)
               @foreach($homeabout as $h)
                <tr>
                    <th scope="row">{{$i++ }} </th>
                    <td>{{ $h->titulo }}</td>
                    <td>{{ $h->texto_curto }}</td>
                    <td>{{ $h->texto_longo }}</td>
                    <td>
                    <a href="{{ url('sobre/edit/'.$h->id)}}" class="btn btn-info"> editar</a>
                    <a href="{{ url('sobre/delete/'.$h->id)}}" onclick="return confirm('Tem certeza que quer deletar ?')" class="btn btn-danger"> apagar</a>
                    </td>

                </tr>
               @endforeach
            </tbody>
            </table>
           

  </div>
</div>


</div>
</div>

    </div>
@endsection