@extends('base')

@section('main')



<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Employees of {{$name}}</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Age</td>
        </tr>
    </thead>
    <tbody>
        @foreach($company as $comapny)
        <tr>
           <td> {{$comapny->id}}</a> </td>
            <td>{{$comapny->name}}</td>
            <td>{{$comapny->age}}</td>
          
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>



@endsection