@extends('admin.admin_master')
 
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <h4>Home Portfolio</h4>
                <a href="{{ route('add.portfolio') }}">  <button type="button" class="btn btn-info"> Adicionar Portfolio </button>  </a>
<br><br>

                <div class="col-md-12">

                    <div class="card">
                      @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success')}}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif

                      <div class="card-header"> Todoss Slider </div>

            <table class="table table-dark table-striped">
    
            <thead>
                <tr>
                    <th scope="col" width="5%">Nº Portfolio</th>
                    <th scope="col" width="15%">Titulo</th>
                    <!--<th scope="col">Caminho Imagem</th> -->
                    <th scope="col" width="25%">Texto</th>
                    <th scope="col" width="15%">Imagem</th>
                    <th scope="col" width="15%">Link</th>
                    <th scope="col" width="15%">Action</th>
                </tr>   
            </thead>
            <tbody>
          @php($i = 1)
               @foreach($portfolio as $p)
                <tr>
                    <th scope="row">{{$i++ }} </th>
                    <td>{{ $p->titulo }}</td>
                    <td>{{ $p->texto }}</td>
                    <td><img src="{{ asset($s->imagem) }} " style="height:40px; width:70px;"> </td>
                    <td>{{ $p->link }}</td>
                    <td>
                    <a href="{{ url('portfolio/edit/'.$p->id)}}" class="btn btn-info"> editar</a>
                    <a href="{{ url('portfolio/delete/'.$p->id)}}" onclick="return confirm('Tem certeza que quer deletar ?')" class="btn btn-danger"> apagar</a>
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