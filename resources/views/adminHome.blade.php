@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>
                    <div class="card-body">
                        You are Admin.
                    </div>
                </div>
            </div>
        </div>
    </div>


  <div class="container-fluid">
      @include('admin.a_layout.main')
  </div>
@endsection



