<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
           Editar Categoria <b></b>
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
        <div class="card-header"> Atualizar Nome da Categoria </div>
            <div class="card-body">
                <form action="{{ url('categorias/update/'.$categorias->id) }}" method="POST"> 
                @csrf
                <div class="form-group">
                    <label for="">Categoria</label>
                    <input type="text" name="categoria_nome" class="form-control" id="categoria" placeholder="Nova categoria" value="{{$categorias->categoria_nome}}">
                    @error('categoria_nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                    <button type="submit" class="btn btn-dark">Atualizar Categoria</button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>

    </div>
</x-app-layout>
