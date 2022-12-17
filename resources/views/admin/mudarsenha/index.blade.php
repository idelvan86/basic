@extends('admin.admin_master')
 
@section('admin')


<div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Alterar senha</h2>
        </div>
        <div class="card-body">

            <form class="form-pill">
                <div class="form-group">
                    <label for="exampleFormControlInput3">Senha atual</label>
                    <input type="password" class="form-control" id="current_password" placeholder="Senha atual">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlPassword3">Nova senha</label>
                    <input type="password" class="form-control" id="password" placeholder="senha">
                </div>

                <div class="form-group">
                    <label for="exampleFormControlPassword3">Confirmar nova senha</label>
                    <input type="password" class="form-control" id="password_confirmation" placeholder="repita a senha">
                </div>

                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Alterar</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
                

            </form>
        </div>
    

    
    </div>
@endsection