


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
                    <h3 class="card-title">Title</h3>


                    <div class="text-center">
                        <a class='col-lg-offset-5 btn btn-success' href="{{route('adminuser.create')}}"> Add New Admin</a>
                    </div>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Admin name</th>
                                    <th>Admin email</th>
                                    <th>Admin contact</th>
                                    <th>Address</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($adminusers as $adminuser)
                                    <tr>
                                        <td>{{$loop->index +1}}</td>
                                        <td>{{$adminuser->admin_name}}</td>
                                        <td>{{$adminuser->admin_email}}</td>
                                        <td>{{$adminuser->contact}}</td>
                                        <td>{{$adminuser->admin_address}}</td>
                                        <td><a href ="{{route('adminuser.edit',$adminuser->id)}}"> Edit</a></td>
                                        <td>
                                            <form id="delete-form-{{$adminuser->id}}"
                                                  method="post"
                                                  action="{{route('adminuser.destroy',$adminuser->id)}}"
                                                  style="display: none">
                                                {{csrf_field()}}
                                                {{method_field('DELETE')}}
                                            </form>
                                            <a href=""  onclick="if(confirm('ARE YOU SURE ,YOU WANT TO DELETE THIS?'))
                                                {
                                                event.preventDefault();
                                                document.getElementById('delete-form-{{$adminuser->id}}').submit();
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