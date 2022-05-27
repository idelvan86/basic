<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            Todas as Marcas <b></b>
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

                      <div class="card-header"> Todas Marcas </div>

            <table class="table table-dark table-striped">
    
            <thead>
                <tr>
                    <th scope="col">Nº Marca</th>
                    <th scope="col">Nome Marca</th>
                    <!--<th scope="col">Caminho Imagem</th> -->
                    <th scope="col">Imagem Marca</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Action</th>
                </tr>   
            </thead>
            <tbody>
         <!-- @php($i = 1) -->
               @foreach($marca as $m)
                <tr>
                    <th scope="row">{{ $marca->firstItem()+$loop->index }} </th>
                    <td>{{ $m->marca_nome }}</td>
                    <!--<td>{{ $m->marca_imagem }}</td> -->
                    <td><img src="{{ asset($m->marca_imagem) }} " style="height:40px; width:70px;"> </td>
                    <td>
                        @if($m->created_at == NULL)
                            <span class="text-danger">Sem Data</span>
                        @else
                            {{ Carbon\Carbon::parse($m->created_at)->diffForHumans() }}
                        @endif
                    </td>
                    <td>
                    <a href="{{ url('marcas/edit/'.$m->id)}}" class="btn btn-info"> editar</a>
                    <a href="{{ url('marcas/delete/'.$m->id)}}" onclick="return confirm('Tem certeza que quer deletar ?')" class="btn btn-danger"> apagar</a>
                    </td>

                </tr>
               @endforeach
            </tbody>
            </table>
           

  </div>
</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header"> Adicionar Marca </div>
            <div class="card-body">
                <form action="{{ route('salvar.marca') }}" method="POST" enctype="multipart/form-data"> 

                @csrf
                <div class="form-group">
                    <label for="">Nome da Marca</label>
                    <input type="text" name="marca_nome" class="form-control" id="categoria" placeholder="Nova categoria">
                    @error('marca_nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Marca Imagem</label>
                    <input type="file" name="marca_imagem" class="form-control" id="categoria" placeholder="Nova categoria">
                    @error('marca_imagem')
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

    </div>
</x-app-layout>
