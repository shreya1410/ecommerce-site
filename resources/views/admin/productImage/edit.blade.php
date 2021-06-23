
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
                        <form role="form" action="{{route('productimage.update',$file->id)}}" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Product  name</label>
                                    <select  name="product[]"  class="form-control select2 select2-hidden-accessible" multiple=""
                                             data-placeholder="Select a product" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($products as $product)
                                            <option value="{{$product->name}}">{{$product->name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Image:</strong>
                                        <input type="file" name="fileCollection[]" class="custom-file-input" id="multiImg" multiple="multiple">
                                        <label class="custom-file-label" for="images">Select File</label>
                                        <?php foreach (json_decode($file->name) as $pic) { ?>
                                        <img src="{{asset('/uploads/'.$pic)}}"  width="70px" />
                                        <?php } ?>

                                    </div>
                                </div>





                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a type="button"  href="{{route('productimage.index')}}" class="btn btn-warning">Back</a>
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
