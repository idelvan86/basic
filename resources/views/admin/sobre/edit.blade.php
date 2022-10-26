@extends('admin.admin_master')
 
@section('admin')


<div class="col-lg-12">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Editar Sobre</h2>
        </div>
        <div class="card-body">
        <form action="{{ url('sobre/update/'.$homeabout->id) }}" method="POST"> 
            @csrf
                <div class="form-group">
                    <label for="exampleFormControlInput1">Titulo Sobre</label>
                    <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $homeabout -> titulo}}">
                    
                </div>
                
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Texto Curto</label>
                    <textarea class="form-control" id="textarea" name="texto_curto" rows="2" >{{ $homeabout -> texto_curto}}</textarea>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Texto Longo</label>
                    <textarea class="form-control" id="textarea" name="texto_longo" rows="4"> {{ $homeabout -> texto_longo}}</textarea>
                </div>
               
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div>



<!-- 
    <div class="col-lg-6">
    <div class="card card-default">
        <div class="card-header card-header-border-bottom">
            <h2>Basic Form Controls</h2>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Email address</label>
                    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Enter Email">
                    <span class="mt-2 d-block">We'll never share your email with anyone else.</span>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlPassword">Password</label>
                    <input type="password" class="form-control" id="exampleFormControlPassword" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect12">Example select</label>
                    <select class="form-control" id="exampleFormControlSelect12">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect2">Example multiple select</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Example textarea</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-footer pt-4 pt-5 mt-4 border-top">
                    <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    <button type="submit" class="btn btn-secondary btn-default">Cancel</button>
                </div>
            </form>
        </div>
    </div> -->

























@endsection