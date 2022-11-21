@extends('admin.admin_master')
 
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <h4>Home Serviços</h4>
                <a href="{{ route('add.servico') }}">  <button type="button" class="btn btn-info"> Criar Serviço </button>  </a>
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
                    <a href="{{ url('servico/edit/'.$s->id)}}" class="btn btn-info"> editar</a>
                    <a href="{{ url('servico/delete/'.$s->id)}}" onclick="return confirm('Tem certeza que quer deletar ?')" class="btn btn-danger"> apagar</a>
                    </td>

                </tr>
               @endforeach
            </tbody>
            </table>
           

  </div>

  
  <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Editar titulo</h2>
        </div>
        <div class="card-body">
        <form action="" method="POST"> 
            @csrf
                <div class="form-group">
                <label for="exampleFormControlInput1">Card Icone</label>
                    <input type="text" class="form-control" id="titulo" name="card_icone" value="">
                    
                </div>
                
                <div class="form-group">
                <label for="exampleFormControlInput1">Card Titulo</label>
                    <input type="text" class="form-control" id="titulo" name="card_titulo" value="">
                    
                </div>
 
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Texto Longo</label>
                    <textarea class="form-control" id="textarea" name="card_descricao" rows="4"></textarea>
                </div>
               
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Atualizar</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
            </form>
        </div>
</div>





</div>
</div>





    </div>
@endsection