@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Update Customer</h1>
 <div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br/>
    @endif
      <form method="post" action="{{ url('updateCustomer') }}">
          @csrf
          <div class="form-group">    
              <label for="customer_name">Name:</label>
              <input type="text" class="form-control" name="customer_name" value="{{$name}}" required />
          </div>

          <div class="form-group">
              <label for="age">Age:</label>
              <input type="number" class="form-control" name="age" value="{{$age}}" required />
          </div>

          <div class="form-group">
            <select name="company_id" class="form-control">
  
             @foreach($companies as $company)
               <option value="{{$company->id}}">{{$company->name}}</option>

             @endforeach
            </select>

          </div>
          <button type="submit" class="btn btn-primary">Update Customer</button>

             </form>
  </div>
</div>
</div>
@endsection