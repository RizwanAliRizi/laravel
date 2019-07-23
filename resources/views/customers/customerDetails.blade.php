@extends('base')
@section('main')



<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Customers</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Age</td>
          <td>CompanyName</td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td> {{$customerDetail->id}}</a>
            <td>{{$customerDetail->name}}</td>
            <td>{{$customerDetail->age}}</td>
            <td> {{$company_name}}
        </tr>
  
    </tbody>
  </table>
<div>
</div>

@endsection