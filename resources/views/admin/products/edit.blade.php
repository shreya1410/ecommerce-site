

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
                        <form role="form" action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}
                            {{method_field('PATCH')}}
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">Product name</label>
                                    <input type="text" class="form-control" id="title" name="name" placeholder="name"
                                           value="{{$product->name}}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Product slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="slug"
                                           value="{{$product->slug}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Product description</label>
                                    <input type="text" class="form-control" id="title" name="description" placeholder="description"
                                           value="{{$product->description}}">
                                </div>
                                <div class="form-group">
                                    <label for="name">Product price</label>
                                    <input type="text" class="form-control" id="title" name="price" placeholder="price"
                                           value="{{$product->price}}">
                                </div>

                                <div class="form-group">
                                    <label>Category</label>
                                    <select name="category[]" class=" form-control select2 select2-hidden-accessible" multiple=""
                                            data-placeholder="Select a category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    @foreach($product->categories as $procat)
                                                    @if($procat->id == $category->id)
                                                    selected
                                                @endif
                                                @endforeach

                                            >{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3 text-center">
                                    <div class="preview"></div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Image:</strong>
                                        <input type="file" name="image[]" class="custom-file-input" id="multiImg" multiple="multiple">
                                        <label class="custom-file-label" for="images">Select File</label>


                                                                                <?php foreach (json_decode($product->image) as $pic) { ?>
                                                                                <img src="{{asset('/uploads/'.$pic)}}"  width="70px" />
                                                                                <?php } ?>
                                    </div>
                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a type="button"  href="{{route('product.index')}}" class="btn btn-warning">Back</a>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
    $(function() {
        var imgPrev = function(input, imgPlaceholder) {

            if (input.files) {
                var allFiles = input.files.length;

                for (i = 0; i < allFiles; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPlaceholder);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#multiImg').on('change', function() {
            imgPrev(this, 'div.preview');
        });
    });
</script>
@section('footerSection')
    <script src="{{asset('admin/plugins/select2/sel.js')}}"></script>
    <script>
        $(document).ready(function (){
            $(".select2").select2();
        });
    </script>
@endsection
