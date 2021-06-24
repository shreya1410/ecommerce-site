


@include('layouts.app')

@extends('admin/a_layout/main')

@section('headSection')
    <link rel="stylesheet" href="{{asset("admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">

    <link rel="stylesheet" href="{{asset("admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{asset("admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css") }}">
    <link rel="stylesheet" href="{{asset("admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css") }}">


    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

@endsection


@section('main-content')


    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"> <a href="home" class="nav-link">Home</a>


                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="card">
                <div class="card-header">

                    <div class="text-center">
                      <a class='col-lg-offset-5 btn btn-success' href="{{route('category.create')}}"><h3> Add New category</h3></a>
                    </div>


                </div>
                <div class="card-body">
                    <div class="card">

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><h2 style="color: #3d0894">Sr. No</h2></th>
                                    <th><h2 style="color: #3d0894">category name</h2></th>
                                    <th><h2 style="color: #3d0894">Category Description</h2></th>
                                    <th><h2 style="color: #3d0894">Edit</h2></th>
                                    <th><h2 style="color: #3d0894">Delete</h2></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $cat)
                                    <tr>
                                        <td><h2>{{$loop->index +1}}</h2></td>
                                        <td><h3>{{$cat->name}}</h3></td>
                                        <td><h3>{{$cat->category_description}}</h3></td>
                                        <td><a class="btn btn-warning" href ="{{route('category.edit',$cat->id)}}"> Edit</a></td>
                                        <td>
                                            <form id="delete-form-{{$cat->id}}"
                                                  method="post"
                                                  action="{{route('category.destroy',$cat->id)}}"
                                                  style="display: none">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            </form>
                                            <a  class="btn btn-danger" href=""  onclick="if(confirm('ARE YOU SURE ,YOU WANT TO DELETE THIS?'))
                                                {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$cat->id}}').submit();
                                                }else
                                                {
                                                event.preventDefault();
                                                }" > Delete</a>
                                        </td>

                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
    </div>
@endsection
