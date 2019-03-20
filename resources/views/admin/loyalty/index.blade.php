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
                            <h3 class="box-title">Loyalty Customers </h3>

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
                                            <th>{{ trans('labels.ID') }}</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone No</th>
                                            <th>Loyalty Points</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                           <tr>
                                               @foreach($customers as $customer)
                                               <td>{{$customer->customers_id}}</td>
                                               <td>{{$customer->customers_firstname.' '.$customer->customers_lastname}}</td>
                                               <td>{{$customer->email}}</td>
                                               <td>{{$customer->customers_telephone}}</td>
                                               <td>{{round($customer->loyalty_points,0)}}</td>
                                               <td>
                                                   <a href="{{url('admin/debit/'.$customer->customers_id)}}" class="btn btn-sm btn-primary">Debit</a>
                                                   <a href="{{url('admin/redeem/'.$customer->customers_id)}}" class="btn btn-sm btn-warning">Redeem</a>
                                                   <a href="{{url('admin/transfer/'.$customer->customers_id)}}" class="btn btn-sm btn-info">Transfer</a>

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


            <!-- Main row -->

            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection
