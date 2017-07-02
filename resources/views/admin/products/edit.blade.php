@extends('admin.layouts.app')

@section('links')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/plugins/select2/select2.min.css') }}">
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="box box-primary">
                {!! Form::model($product, ['method' => 'PATCH', 'action' => ['Admin\ProductController@update', $product->id]]) !!}
                <div class="box-body">
                    @include('admin.products.form', ['submitButtonText' => 'Edit'])
                </div><!-- /.box-body -->
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div><!--/.col (left) -->

        <div class="col-sm-12 col-md-4">
            <!-- CHARACTERISTICS -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>
                    <h3 class="box-title">Characteristics</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    {!! Form::model($characteristics, ['method' => 'POST', 'route' => ['add-characteristics', 'product' => $product->id]]) !!}
                    <div class="form-group">
                        {!! Form::select('characteristics[]', $characteristics,  null, [
                        'class' => 'form-control select2',
                        'multiple' => 'multiple',
                        'data-placeholder' => 'Select a Characteristics for this Product',
                        'style' => 'width: 100%',
                        ]) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary pull-right']) !!}
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.box-body -->

                <div class="box-body">
                    <p class="text-center">
                        <a data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <i class="glyphicon glyphicon-plus"></i>Add a new characteristic
                        </a>
                    </p>

                    <div class="collapse" id="collapseExample">
                        <div class="well clearfix">
                            {!! Form::open(['url' => 'admin/characteristics']) !!}
                                <div class="form-group">
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                                <button class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>   <!-- /.row -->
@stop

@section('scripts')
    <!-- Select2 -->
    <script src="{{ asset('/bower_components/AdminLTE/plugins/select2/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
        });
    </script>
@stop