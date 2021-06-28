
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


                        <form role="form" action="{{route('subcategory.update',$subcategory->sub_category_id)}}" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">category name</label>
                                    <select  name="maincategory[]"  id="maincategory" class="form-control select2 select2-hidden-accessible" multiple=""
                                             data-placeholder="Select a product" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($maincategory as $maincat)
                                            <option value="{{$maincat->id}}">{{$maincat->main_category_name}}</option>
                                            @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Category name</label>
                                    <input type="text" class="form-control" id="sub_category_name" name="sub_category_name" placeholder="name"
                                           value="{{$subcategory->sub_category_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Category description</label>
                                    <input type="text" class="form-control" id="sub_category_description" name="sub_category_description" placeholder="category description"
                                           value="{{$subcategory->sub_category_description}}">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a type="button"  href="{{route('subcategory.index')}}" class="btn btn-warning">Back</a>
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
