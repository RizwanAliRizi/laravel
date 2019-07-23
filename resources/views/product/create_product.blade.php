@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a Product</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('saveProduct') }}" enctype='multipart/form-data'>
          @csrf
          <div class="form-group">    
              <label for="product_name">Product Name:</label>
              <input type="text" class="form-control" name="product_name"/>
          </div>

          <div class="form-group">
              <label for="product_price">Product Price:</label>
              <input type="text" class="form-control" name="product_price"/>
          </div>
          <div class="form-group">
            <select name="category_ids[]" class="form-control" multiple>
              @foreach($categories as $category)
              <option value="{{$category->id}}"> {{$category->title }}  </option>
  
              @endforeach
            </select>
          </div>

          <div  class="form-group">
            <label>Upload Image:</label>
          <input type="file" name="myfile" class="form-control"> 
          </div>
                
          <button type="submit" class="btn btn-primary-outline">Add Product</button>
          <a href="{{ route('allproducts') }}" class="btn-primary-outline">Show Products </a>
      </form>
  </div>
</div>
</div>
@endsection