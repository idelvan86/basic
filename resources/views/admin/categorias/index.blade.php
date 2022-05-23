<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            Todas as Categorias <b></b>
                  <b  style="float:right;"> 
                    <span class="badge bg-danger"></span> 
                  </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                      @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success')}}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif

                      <div class="card-header"> Todas Categorias </div>

            <table class="table table-dark table-striped">
    
            <thead>
                <tr>
                    <th scope="col">Nº Categoria</th>
                    <th scope="col">Nome</th>
                    <th scope="col">criador</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Action</th>
                </tr>   
            </thead>
            <tbody>
         <!-- @php($i = 1) -->
               @foreach($categorias as $cat)
                <tr>
                    <th scope="row">{{ $categorias->firstItem()+$loop->index }} </th>
                    <td>{{ $cat->categoria_nome }}</td>
                    <td>{{ $cat->user->name }}</td>
                    <td>
                        @if($cat->created_at == NULL)
                            <span class="text-danger">Sem Data</span>
                        @else
                            {{ Carbon\Carbon::parse($cat->created_at)->diffForHumans() }}
                        @endif
                    </td>
                    <td>
                    <a href="{{ url('categorias/edit/'.$cat->id)}}" class="btn btn-info"> editar</a>
                    <a href="{{ url('softdelete/categorias/'.$cat->id)}}" class="btn btn-danger"> apagar</a>
                    </td>

                </tr>
               @endforeach
            </tbody>
            </table>
            {{ $categorias->links() }}

  </div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header"> Adicionar Categorias </div>
            <div class="card-body">
                <form action="{{ route('salvar.categoria') }}" method="POST"> 
                @csrf
                <div class="form-group">
                    <label for="">Categoria</label>
                    <input type="text" name="categoria_nome" class="form-control" id="categoria" placeholder="Nova categoria">
                    @error('categoria_nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-dark">adicionar categoria</button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>





<!-- Trash Part -->




<div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-header"> Lista Lixeira </div>

            <table class="table table-dark table-striped">
    
            <thead>
                <tr>
                    <th scope="col">Nº Categoria</th>
                    <th scope="col">Nome</th>
                    <th scope="col">criador</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Action</th>
                </tr>   
            </thead>
            <tbody>
         <!-- @php($i = 1) -->
               @foreach($trashCat as $cat)
                <tr>
                    <th scope="row">{{ $categorias->firstItem()+$loop->index }} </th>
                    <td>{{ $cat->categoria_nome }}</td>
                    <td>{{ $cat->user->name }}</td>
                    <td>
                        @if($cat->created_at == NULL)
                            <span class="text-danger">Sem Data</span>
                        @else
                            {{ Carbon\Carbon::parse($cat->created_at)->diffForHumans() }}
                        @endif
                    </td>
                    <td>
                    <a href="{{ url('categorias/restaurar/'.$cat->id)}}" class="btn btn-info"> Restaurar</a>
                    <a href="{{ url('apagarp/categorias/'.$cat->id)}}" class="btn btn-danger">Apagar P.</a>
                    </td>

                </tr>
               @endforeach
            </tbody>
            </table>
            {{ $trashCat->links() }}

  </div>
</div>

<div class="col-md-4">
   
    </div>

</div>
</div>

<!-- End Trash Part -->

    </div>
</x-app-layout>
