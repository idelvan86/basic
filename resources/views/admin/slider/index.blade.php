@extends('admin.admin_master')
 
@section('admin')

    <div class="py-12">
        <div class="container">
            <div class="row">

                <h4>Home SLider</h4>
                <a href="">  <button type="button" class="btn btn-info"> Adicionar Slider </button>  </a>
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
                    <th scope="col">Nº Marca</th>
                    <th scope="col">Slider Titulo</th>
                    <!--<th scope="col">Caminho Imagem</th> -->
                    <th scope="col">Descrição</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Action</th>
                </tr>   
            </thead>
            <tbody>
         <!-- @php($i = 1) -->
               @foreach($sliders as $s)
                <tr>
                    <th scope="row">{{$sliders->firstItem()+$loop->index }} </th>
                    <td>{{ $s->title }}</td>
                    <td>{{ $S->descricao }}</td>
                    <td><img src="{{ asset($s->imagem) }} " style="height:40px; width:70px;"> </td>
                    <td>
                    <a href="{{ url('slider/edit/'.$m->id)}}" class="btn btn-info"> editar</a>
                    <a href="{{ url('slider/delete/'.$m->id)}}" onclick="return confirm('Tem certeza que quer deletar ?')" class="btn btn-danger"> apagar</a>
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