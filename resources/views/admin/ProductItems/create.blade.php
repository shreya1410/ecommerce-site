
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


                        <form role="form" action="{{route('products.store')}}" method="post" enctype="multipart/form-data">

                            {{csrf_field()}}
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="name">Main Category name</label>
                                    <select  name="subcategory[]"  class="form-control select2 select2-hidden-accessible" multiple=""
                                             data-placeholder="Select a category" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        @foreach($subcategories as $subcategory)
                                            <option value="{{$subcategory->sub_category_id}}">{{$subcategory->sub_category_name}}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="name">Product name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Product name" value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="slug">Product slug</label>
                                    <input type="text" class="form-control" id="slug" name="slug" placeholder="Product slug" value="{{old('slug')}}">
                                </div>

                                <div class="form-group">
                                    <label for="description">Product description</label>
                                    <input type="text" class="form-control" id="description" name="description" placeholder="description" value="{{old('description')}}">
                                </div>

                                <div class="form-group">
                                    <label for="price">Product price</label>
                                    <input type="text" class="form-control" id="price" name="price" placeholder="price" value="{{old('price')}}">
                                </div>


                                <div class="mb-3 text-center">
                                    <div class="preview"></div>
                                </div>

                                <div class="custom-file">
                                    <input type="file" name="image[]" class="custom-file-input" id="multiImg" multiple="multiple">
                                    <label class="custom-file-label" for="images">Select File</label>
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
