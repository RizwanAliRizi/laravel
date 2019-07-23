@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Companies</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Phone Numbers</td>
        </tr>
    </thead>
    <tbody>
        @foreach($all_companies as $comapny)
        <tr>
           <td> <a href="{{ route ('company_customer',$comapny->id)}}"> {{$comapny->id}}</a> </td>
            <td>{{$comapny->name}}</td>
            <td>{{$comapny->phone}}</td>
          
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>

@endsection