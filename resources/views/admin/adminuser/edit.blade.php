
@include('layouts.app')
@extends('admin/a_layout/main')

@section('headSection')
    <link rel="stylesheet" href="{{asset('admin/plugins/select2/css/select2.min.css')}}">

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
@endsection

@section('main-content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Text Editors
                <small>Advanced form element</small>
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <!-- /.box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Titles</h3>
                        </div>

                        @if(count($errors) >0)
                            @foreach($errors->all() as $error)
                                <p class="alert alert-danger">{{$error}}</p>
                            @endforeach
                        @endif


                        {{--                        @if (session()->has('message'))--}}
                        {{--                            <p class="alert-default-success">{{session('message')}}</p>--}}
                        {{--                        @endif--}}
                        <form role="form" action="{{route('adminuser.update',$adminuser->id)}}" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="admin_name">Admin Name</label>
                                    <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="Admin name"
                                    value="{{$adminuser->admin_name}}">
                                </div>

                                <div class="form-group">
                                    <label for="admin_email">Admin email</label>
                                    <input type="text" class="form-control" id="admin_email" name="admin_email" placeholder="Admin email"
                                           value="{{$adminuser->admin_email}}">
                                </div>

                                <div class="form-group">
                                    <label for="admin_address">Admin Address</label>
                                    <input type="text" class="form-control" id="admin_address" name="admin_address" placeholder="Admin address"
                                           value="{{$adminuser->admin_address}}">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Contact</label>
                                    <input type="number" class="form-control" id="contact" name="contact" placeholder="Contact"
                                           value="{{$adminuser->contact}}">
                                </div>




                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a type="button"  href="{{route('adminuser.index')}}" class="btn btn-warning">Back</a>
                            </div>
                        </form>
                    </div>


                </div>
                <!-- /.col-->
            </div>
            <!-- ./row -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('footerSection')
    <script src="{{asset('admin/plugins/select2/sel.js')}}"></script>
    <script>
        $(document).ready(function (){
            $(".select2").select2();
        });
    </script>
@endsection
