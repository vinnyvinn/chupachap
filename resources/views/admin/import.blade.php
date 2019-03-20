@extends('admin.layout')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <!-- Info boxes -->

            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Import Data</h3>
                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box box-info">
                                        <br>
                                        @if (count($errors) > 0)
                                            @if($errors->any())
                                                <div class="alert alert-success alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    {{$errors->first()}}
                                                </div>
                                        @endif
                                    @endif

                                    <!-- form start -->
                                        <div class="box-body">
                                            <a href="{{ url('admin/downloadExcel/xls') }}"><button class="btn btn-success">Download Excel xls</button></a>
                                            <a href="{{ url('admin/downloadExcel/xlsx') }}"><button class="btn btn-success">Download Excel xlsx</button></a>
                                            <a href="{{ url('admin/downloadExcel/csv') }}"><button class="btn btn-success">Download CSV</button></a>
                                            <form style="border: 4px solid #a1a1a1;margin-top: 15px;padding: 10px;" action="{{ url('admin/import-excel') }}" class="form-horizontal" method="post" enctype="multipart/form-data">

                                                {{csrf_field()}}
                                                   <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Import  File</label>
                                                        <input type="file" name="import_file"/>
                                                    </div>
                                                </div>


                                                <div class="box-footer text-center">
                                                    <button type="submit" class="btn btn-primary">Import</button>
                                                    <a href="{{ URL::to('admin/points')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>

@endsection



