@extends('admin.admin_master')
 
@section('admin')


<div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Atualizar Perfil de Usuário</h2>
        </div>
        <div class="card-body">

            <form method="post" action="{{ route('senha.atualizar') }}" class="form-pill">
               @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">Nome do usuário</label>
                    <input type="text" name="nome" class="form-control" id="current_password" placeholder="Senha atual" required>

                </div>


                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Atualizar</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
                

            </form>
        </div>
    

    
    </div>
@endsection