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
                            <h3 class="box-title">Choose Period</h3>
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
                                            <form action="{{url('admin/get-report')}}" method="POST">
                                                {{csrf_field()}}

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">From :</label>
                                                        <input type="text" name="date_from" class="form-control pick-date" placeholder="Date from">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">To :</label>
                                                        <input type="text" name="date_to" class="form-control pick-date" placeholder="Date to">
                                                    </div>
                                                </div>



                                                <div class="box-footer text-center">
                                                    <button type="submit" class="btn btn-primary">Generate Report</button>
                                                    <a href="{{ URL::to('admin/send-messages')}}" type="button" class="btn btn-default">{{ trans('labels.back') }}</a>
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



