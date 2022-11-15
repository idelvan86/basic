@extends('admin.admin_master')
 
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <h4>Home Serviços</h4>
                <a href="{{ route('add.servico') }}">  <button type="button" class="btn btn-info"> Criar Sobre </button>  </a>
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
                    <th scope="col" width="5%">Nº Serviço</th>
                    <th scope="col" width="25%">Icone Card</th>
                    <th scope="col" width="15%">Titulo card</th>
                    <th scope="col" width="15%">Descrição Card</th>
                </tr>   
            </thead>
            <tbody>
          @php($i = 1)
               @foreach($servico as $s)
                <tr>
                    <th scope="row">{{$i++ }} </th>
                    <td>{{ $s->card_icone }}</td>
                    <td>{{ $s->card_titulo }}</td>
                    <td>{{ $s->card_descricao }}</td>
                    <td>
                    <a href="{{ url('sobre/edit/'.$s->id)}}" class="btn btn-info"> editar</a>
                    <a href="{{ url('sobre/delete/'.$s->id)}}" onclick="return confirm('Tem certeza que quer deletar ?')" class="btn btn-danger"> apagar</a>
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