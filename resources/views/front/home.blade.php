@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Categories</div>

                <div class="panel-body">
                    <ul>
                        @each('front.partial._category', $categories, 'category')
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Popular Products</div>

                <div class="panel-body">
                    <div class="row">
                        @foreach($popularProducts as $product)
                            <div class="col-xs-12">
                                <h2>{{ $product->name }}</h2>
                                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                                <p><a class="btn btn-default" href="{{ route('product', ['slug' => $product->slug]) }}" role="button">View details »</a></p>
                            </div><!--/.col-xs-6.col-lg-4-->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
