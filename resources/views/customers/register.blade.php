@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Customers</h1>
  <div>
  @if(session('message'))
<div class="alert alert-danger" >{{session('message')}} </div> 

  @endif

  @if(session('saveEmployee'))

  <div class="alert alert-success" >{{session('saveEmployee')}} </div> 

  @endif

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('savingData') }}">
          @csrf
          <div class="form-group">    
              <label for="customer_name">Name:</label>
              <input type="text" class="form-control" name="customer_name"/>
          </div>

          <div class="form-group">
              <label for="age">Age:</label>
              <input type="number" class="form-control" name="age"/>
          </div>

          <div class="form-group">
            <select name="company_id" class="form-control" >
  
             @foreach($companies as $company)
               <option value="{{$company->id}}">{{$company->name}}</option>

             @endforeach
            </select>

          </div>
                
          <button type="submit" class="btn btn-primary-outline">Add customer</button>
          <a href="{{ route('allcustomer') }}" class="btn-primary-outline">
          Show Customers</a>

      </form>
  </div>
</div>
</div>
@endsection