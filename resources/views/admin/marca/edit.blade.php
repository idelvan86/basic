@extends('admin.admin_master')
 
@section('admin')

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success')}}</strong> 
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

    <div class="py-12">
        <div class="container">
            <div class="row">
              

<div class="col-md-8">
    <div class="card">
        <div class="card-header"> Atualizar Marca </div>
            <div class="card-body">
                <form action="{{ url('marcas/update/'.$marcas->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                <!-- Criando Inpt para imagem antiga -->
                <input type="hidden" name="antiga_imagem" value="{{$marcas->marca_imagem}}">

                <!-- Dados para serem editados -->
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

                <!-- Criando Inpt para imagem antiga -->
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
@endsection 
