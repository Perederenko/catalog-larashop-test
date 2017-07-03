@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p class="text-center">
                            Search Results "{{ $query }}"
                        </p>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            @if(count($products))
                                @foreach($products as $product)
                                    <div class="col-xs-12">
                                        <h2>{{ $product->name }}</h2>
                                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                        <p><a class="btn btn-default" href="{{ route('product', ['slug' => $product->slug]) }}" role="button">View details »</a></p>
                                    </div><!--/.col-xs-6.col-lg-4-->
                                @endforeach
                            @else
                                <p>Nothing yet.</p>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
