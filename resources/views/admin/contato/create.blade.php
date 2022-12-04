@extends('admin.admin_master')
 
@section('admin')

<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Adicionar Contato</h2>
        </div>
        <div class="card-body">
        <form action="{{ route('salvar.contato') }}" method="POST"> 
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Contato Endereço</label>
                    <input type="text" class="form-control" name="endereco" placeholder="informe o titulo">
                    
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Contato E-mail</label>
                    <input type="email" class="form-control" name="email" placeholder="informe o titulo">
                    
                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput1">Contato Telefone</label>
                    <input type="tel" class="form-control" name="telefone" placeholder="informe o titulo">
                    
                </div>
                               
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Salvar</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>

            </form>
      
        </div>
        
    </div>

@endsection