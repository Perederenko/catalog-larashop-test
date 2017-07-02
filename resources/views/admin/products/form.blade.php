<div class="form-group">
    {!! Form::label('name', 'Product Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control', 'id' => 'editor']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', $categories,  null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('price', 'Price') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}
</div>

@if(isset($product) && $product->characteristics)
    @foreach($product->characteristics as $char)
        <div class="form-group">
            {!! Form::label($char->name, $char->name) !!}
            {!! Form::text($char->name, null, ['class' => 'form-control']) !!}
        </div>
    @endforeach
@endif

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary']) !!}
</div>

<div class="row">
    <div class="col-xs-12">
        <hr>
        <a href="{{ route('admin.products.index') }}"><i class="fa fa-long-arrow-left"></i> Back</a>
    </div>
</div>

<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>