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
                            <h3 class="box-title">Edit Policy</h3>
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
                                            <form action="{{url('admin/policies',['id'=>$policy->id])}}" method="POST">
                                                {{csrf_field()}}
                                                {{method_field("PUT")}}
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Policy Title</label>
                                                        <input type="text" name="amount" class="form-control" value="{{$policy->title}}" disabled>
                                                    </div>
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Amount</label>
                                                        <input type="number" name="amount" class="form-control" value="{{$policy->amount}}" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                        <textarea name="description" id="description" cols="3" rows="2" class="form-control" disabled>{{$policy->description}}</textarea>

                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label for="">Points</label>
                                                        <input type="number" name="points" class="form-control" value="{{$policy->points}}">
                                                    </div>
                                                </div>

                                                <div class="box-footer text-center">
                                                    <button type="submit" class="btn btn-primary">Update</button>
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



