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
                         <h3 class="box-title">Loyalty Policies </h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">


                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="loyalty" class="table table-bordered table-striped loyalty">
                                        <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Title</th>
                                            <th>Amount</th>
                                            <th>Points</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($policies as $policy)
                                                <td>{{$policy->id}}</td>
                                                <td>{{$policy->title}}</td>
                                                <td>{{$policy->amount}}</td>
                                                <td>{{$policy->points}}</td>
                                                <td>{{$policy->description}}</td>
                                                <td>
                                                    <a href="{{url('admin/policies/'.$policy->id.'/edit')}}" class="btn btn-sm btn-success"><i class="fa fa-pencil"></i>Change</a>

                                                </td>
                                        </tr>
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
