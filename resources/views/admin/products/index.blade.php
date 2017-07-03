@extends('admin.layouts.app')

@section('links')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary btn-large btn-flat active create" role="button">Add new</a>
            <div class="box">
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th></th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td><img src="{{ $product->getImage() }}" alt="{{ $product->photo }}"class="img-thumbnail"></td>
                                <td>{{ $product->created_at->format('Y-m-d') }}</td>
                                <td><a href="{{ route('admin.products.edit', ['products'=> $product->id]) }}">{{ $product->name }}</a></td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->price}}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', ['products'=> $product->id]) }}" class="btn btn-default btn-xs btn-flat active" role="button">
                                        <span class="glyphicon glyphicon-pencil" area-hidden="true"></span>
                                    </a>
                                </td>
                                <td>
                                    <button type="submit" class="data-delete btn  btn-default btn-xs btn-flat active" name="{{ $product->id }}" >
                                        <span class="glyphicon glyphicon-remove" area-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Image</th>
                            <th></th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('/bower_components/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function(){

            /**
             * Deletes the table's row
             * added for <button> : name="{id}"
             */
            $('.data-delete').click(function(e){
                var message = 'Are you sure?';
                var inputUrl = '{{ URL::to('admin/products') }}';
                new DeleteTableRow(e, $(this), message, inputUrl);
            });

            $('#example').DataTable();

        });
    </script>
@stop