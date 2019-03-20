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
                            <h3 class="box-title">Transfer Points</h3>
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
                                            <form action="{{url('admin/update-transfer')}}" method="POST">
                                                {{csrf_field()}}
                                                <input type="hidden" name="id" value="{{$customer->customers_id}}">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Customer to be transfered</label>
                                                        <select name="customer_id" id="" class="form-control select2">
                                                            <option value="{{$customer->customers_id}}">{{$customer->customers_firstname.' '.$customer->customers_lastname}}</option>
                                                          @foreach($customers as $client)
                                                                <option value="{{$client->customers_id}}">{{$client->customers_firstname.' '.$client->customers_lastname}}</option>
                                                       @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="">Points to Transfer</label>
                                                        <input type="number" name="amount" class="form-control" placeholder="Enter amount Spent">
                                                    </div>
                                                </div>


                                                <div class="box-footer text-center">
                                                    <button type="submit" class="btn btn-primary">Transfer Points</button>
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



