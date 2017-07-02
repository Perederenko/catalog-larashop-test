<div class="form-group">
    {!! Form::label('name', 'Category name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('parent_id', 'Parent') !!}
    {!! Form::select('parent_id', $categories, null,  ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>

<div class="row">
    <div class="col-xs-12">
        <hr>
        <a href="{{ route('admin.categories.index') }}"><i class="fa fa-long-arrow-left"></i> Back</a>
    </div>
</div>