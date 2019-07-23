@extends('base')

@section('main')
<!-- <div class="row">
<div class="col-sm-12">
    <h1 class="display-3">Products</h1>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>ProductName</td>
          <td>ProductPrice</td>
          <td>Category</td>
          <td>AttchedFile</td>
        </tr>
    </thead>
    <tbody>
        @foreach($all_products as $product)
        <tr>
           <td> {{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>
            @foreach($product->categories as $productCategory)
           <?php $name = App\Category::find($productCategory->pivot->category_id)->title; ?>
             {{ $name }}
            @endforeach
            </td>
            <td><img style="width: 10%;height: 20%" src="/storage/myfile/{{$product->file}}"></td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
 -->

 @foreach($all_products as $product)
 <div class="row">
<div class="card" style="width: 15rem; margin: 30px">
  <img class="card-img-top" style="width: 100%;height: 50%" src="/storage/myfile/{{$product->file}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><h3>Name: {{$product->name}} </h3></h5>

   <h7><h4>Price: {{$product->price}}</h4></h7>

   <h4> Category: </h4>
   @foreach($product->categories as $productCategory)
 <?php $name = App\Category::find($productCategory->pivot->category_id)->title; ?>
   <h7> {{ $name }},
   @endforeach
    </h7>
    <a style="margin: 20px" href="#" class="btn btn-primary">Go somewhere</a>
  </div>
</div>
@endforeach


</div>

@endsection