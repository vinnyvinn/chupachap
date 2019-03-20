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
                            <h3 class="box-title">Sent Messages </h3>

                        </div>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                        <?php $i=1;?>

                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="loyalty" class="table table-bordered table-striped loyalty">
                                        <thead>
                                        <tr>
                                            <th>{{ trans('labels.ID') }}</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Date Created</th>
                                            <th width="50%">Message</th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($messages as $message)
                                                <td>{{$i}}</td>
                                                <td>{{$message->username}}</td>
                                                <td>{{$message->email}}</td>
                                                <td>{{$message->phone}}</td>
                                                <td>{{date('d-m-Y', strtotime($message->created_at))}}</td>
                                                <td>{{$message->message}}</td>

                                        </tr>
                                        <?php $i++?>
                                        @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>

            <!-- /.row -->



            <!-- Main row -->

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
