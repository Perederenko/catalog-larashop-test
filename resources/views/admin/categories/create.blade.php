@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="box box-primary">
                {!! Form::open(['url' => 'admin/categories']) !!}
                <div class="box-body">
                    @include('admin.categories.form', ['submitButtonText' => 'Add'])
                </div><!-- /.box-body -->
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
@stop