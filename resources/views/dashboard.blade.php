<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            
            OLA.. <b>{{ Auth::user()->name }}</b>
                  <b  style="float:right;"> Total de usuarios
                    <span class="badge bg-danger"> {{ count($users)}}</span> 
                  </b>
        </h2>
    </x-slot>

    <div class="py-12">
    <div class="container">
    <div class="row">

    <table class="table table-dark table-striped">

    
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Criado em</th>
                </tr>   
            </thead>
            <tbody>
                @php($n = 1)
                @foreach($users as $usuarios)
                <tr>
                    <th scope="row">{{$usuarios->id}} {{$n++}} </th>
                    <td>{{ $usuarios->name}}</td>
                    <td>{{ $usuarios->email}}</td>
                    <td>{{ Carbon\Carbon::parse($usuarios->created_at)->diffForHumans()}}</td>
                </tr>
                @endforeach
            </tbody>
            </table>


</div>
</div>



    </div>
</x-app-layout>
