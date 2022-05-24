<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
           Editar Marca <b></b>
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
        <div class="card-header"> Atualizar Marca </div>
            <div class="card-body">
                <form action="{{ url('marca/update/'.$marcas->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" name="marca_nome" class="form-control" id="marca" placeholder="Nova categoria" value="{{$marcas->marca_nome}}">
                    @error('marca_nome')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Imagem</label>
                    <input type="file" name="marca_imagem" class="form-control" id="marca" placeholder="Nova categoria" value="{{$marcas->marca_imagem}}">
                    @error('marca_imagem')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

<div class="form-group">

<img src="{{ asset($marcas->marca_imagem) }}" alt="" style="height:400px; width:200px;">


</div>


                    <button type="submit" class="btn btn-dark">Atualizar Marca</button>
                </form>
            </div>
        </div>
    </div>

</div>
</div>

    </div>
</x-app-layout>
