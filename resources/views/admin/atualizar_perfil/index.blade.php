@extends('admin.admin_master')
 
@section('admin')


<div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Atualizar Perfil de Usuário</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success')}}</strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>  
        @endif

        <div class="card-body">

            <form method="post" action="{{ route('profile.atualizar') }}" class="form-pill">
               @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput3">Nome do usuário</label>
                    <input type="text" name="nome" class="form-control" id="current_password" placeholder="Senha atual" value="{{ $user['name'] }}" required>

                </div>

                <div class="form-group">
                    <label for="exampleFormControlInput3">E-mail do usuário</label>
                    <input type="text" name="email" class="form-control" id="current_password" placeholder="Senha atual" value="{{ $user['email'] }}" required>

                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Atualizar</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
                

            </form>
        </div>
    

    
    </div>
@endsection