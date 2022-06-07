<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            Varias Imagens <b></b>
                  <b  style="float:right;"> 
                    <span class="badge bg-danger"></span> 
                  </b>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

            
<div class=" card-group">
    @foreach($imagens as $i)
        <div class="col-md-3">
            <div card class="card">
                <img src="{{ asset($i->imagem) }}" alt="">
            </div>
        </div>
    @endforeach
</div>

<!--// modelo igual a Marcas -->                
<!--
                    <div class="card">
                      @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success')}}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif

                      <div class="card-header"> Todas Imagens </div>

            <table class="table table-dark table-striped">
    
            <thead>
                <tr>
                    
                 
                    <th scope="col">Caminho Imagem</th> 
                    <th scope="col">Imagem</th>
                    <th scope="col">Criado em</th>
                    <th scope="col">Action</th>
                </tr>   
            </thead>
            <tbody>
          @php($i = 1) 
               @foreach($imagens as $m)
                <tr>
                   
                    <td>{{ $m->marca_imagem }}</td> 
                    <td><img src="{{ asset($m->imagem) }} " style="height:40px; width:70px;"> </td>
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
            -->     

</div>

<div class="col-md-4">
    <div class="card">
        <div class="card-header"> Adicionar Imagens </div>
            <div class="card-body">
                <form action="{{ route('salvar.imagens') }}" method="POST" enctype="multipart/form-data"> 

                @csrf
                

                <div class="form-group">
                    <label for="">Multi Imagens</label>
                    <input type="file" name="imagens[]" multiple="" id="marca_imagem" class="form-control" placeholder="Nova categoria" >
                    @error('marca_imagem')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                    <button type="submit" class="btn btn-dark">adicionar Imagens</button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>

    </div>
</x-app-layout>
