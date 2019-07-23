@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Assign Role to Users </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>

                    @foreach($users as $user)
                    	<li><a href="{{url('userToAssignRole',$user->name)}}">{{$user->name}} </a></li>
   					@endforeach
   				</ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection