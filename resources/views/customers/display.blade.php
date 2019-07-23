@extends('base')

@section('main')
<style type="text/css">
  
   table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
</style>

<div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Employees</h1> 

    @if(session('updateCustomer'))
    <div class="alert alert-success">{{session('updateCustomer')}}</div>
    @endif   

     @if(session('deleteCutomer'))
    <div class="alert alert-success">{{session('deleteCutomer')}}</div>
    @endif   
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Name</td>
          <td>Age</td>
          <td>CompanyName</td>
          <td>Action </td>
        </tr>
    </thead>
    <tbody>
        @foreach($all_customer as $customer)
        <tr>
            <td> {{$customer->id}}</td>
            <td>{{$customer->name}}</td>
            <td>{{$customer->age}}</td>
             <td>{{$customer->company->name}}</td>
             <td>

              <a class="edit" title="Edit" data-toggle="tooltip" href="{{route ('edit_cutomer',$customer->id)}}" ><i class="material-icons">&#xE254;</i></a>
    
              <a class="delete" title="Delete" data-toggle="tooltip" href="{{ url ('deleteCutomer',$customer->id)}}"><i class="material-icons">&#xE872;</i></a>

           </td>

        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection