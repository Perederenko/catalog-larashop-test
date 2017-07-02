@extends('admin.layouts.app')

@section('links')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/bower_components/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
@stop

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-primary btn-large btn-flat active create" role="button">Add</a>
            <div class="box">
                <div class="box-body">
                    <table id="example" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Category Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->created_at->format('Y-m-d') }}</td>
                                <td><a href="{{ route('admin.categories.edit', ['categories'=> $category->id]) }}">{{ $category->name }}</a> ({{ $category->countProductsByCategory() }})</td>
                                <td>
                                    <a href="{{ route('admin.categories.edit', ['categories'=> $category->id]) }}" class="btn btn-default btn-xs btn-flat active" role="button">
                                        <span class="glyphicon glyphicon-pencil" area-hidden="true"></span>
                                    </a>
                                </td>
                                <td>
                                    <button type="submit" class="data-delete btn  btn-default btn-xs btn-flat active" name="{{ $category->id }}" >
                                        <span class="glyphicon glyphicon-remove" area-hidden="true"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th></th>
                            <th>Category Name</th>
                            <th></th>
                            <th></th>
                        </tr>
                        </tfoot>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection

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
                var inputUrl = '{{ URL::to('admin/categories') }}';
                new DeleteTableRow(e, $(this), message, inputUrl);
            });

            $('#example').DataTable();

        });
    </script>
@stop