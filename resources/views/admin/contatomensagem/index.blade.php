@extends('admin.admin_master')
 
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <h4>Contato Mensagens</h4>
                <a href="{{ route('add.contato') }}">  <button type="button" class="btn btn-info"> Responder Contato </button>  </a>
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
                    <th scope="col" width="15%">Nome</th>
                    <th scope="col" width="15%">E-mail</th>
                    <th scope="col" width="15%">titulo</th>
                    <th scope="col" width="15%">Mensagem</th>
                    <th scope="col" width="15%">Action</th>
                </tr>   
            </thead>
            <tbody>
          @php($i = 1)
               @foreach($contato as $c)
                <tr>
                    <th scope="row">{{$i++ }} </th>
                    <td>{{ $c->nome }}</td>
                    <td>{{ $c->email }}</td>
                    <td>{{ $c->titulo }}</td>
                    <td>{{ $c->mensagem }}</td>
                    <td>
                    <a href="{{ url('contato/edit/'.$c->id)}}" class="btn btn-info"> editar</a>
                    <a href="{{ url('contato/delete/'.$c->id)}}" onclick="return confirm('Tem certeza que quer deletar ?')" class="btn btn-danger"> apagar</a>
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