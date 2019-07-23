@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Assign Role For {{$name}} </div>

                <div class="card-body">
                    <form action="{{ url('AssigningRolesPermissions',$name)}}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col col-md-6">  <h1> Permissions </h1>
                    <ul>
                  @foreach($permissions as $permission)
                   <input type="checkbox" name="permissions[]" value="{{$permission->name}}" checked>{{$permission->name}}<br>

                  @endforeach
                   </ul>
               </div>
                         <div class="col col-md-6">
                             
                             <h1>Roles</h1>
                    <ul>
                  @foreach($roles as $role)
                     <input type="checkbox" name="roles[]" value="{{$role->name}}" checked>{{$role->name}}<br>

                  @endforeach
                   </ul>

                         </div>
                    </div>
                    <div class="row justify-content-center">
                <button class="btn btn-success" style="width: 50%" type="submit">Submit</button>
            </div>
</form>
                  
                </div>
            </div>
        </div>
    </div>
</div>

@endsection