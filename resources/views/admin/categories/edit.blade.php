@extends('admin.layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="box box-primary">
                {!! Form::model($category, ['method' => 'PATCH', 'action' => ['Admin\CategoryController@update', $category->id]]) !!}
                <div class="box-body">
                    @include('admin.categories.form', ['submitButtonText' => 'Edit a category'])
                </div><!-- /.box-body -->
                {!! Form::close() !!}
            </div><!-- /.box -->
        </div><!--/.col (left) -->
    </div>   <!-- /.row -->
@stop