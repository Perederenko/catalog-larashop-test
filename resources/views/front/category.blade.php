@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <p class="text-center">{{ $category->name }}</p>
                    </div>


                    <div class="panel-body">
                        <div class="btn-group" role="group" aria-label="...">
                            <a href="{{ URL::current() }}?name=asc" type="button" class="btn btn-default">Name
                                <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                            </a>
                            <a href="{{ URL::current() }}?name=desc" type="button" class="btn btn-default">Name
                                <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
                            </a>
                            <a href="{{ URL::current() }}?price=asc" type="button" class="btn btn-default">Price
                                <i class="fa fa-sort-amount-asc" aria-hidden="true"></i>
                            </a>
                            <a href="{{ URL::current() }}?price=desc" type="button" class="btn btn-default">Price
                                <i class="fa fa-sort-amount-desc" aria-hidden="true"></i>
                            </a>
                        </div>
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-xs-12">
                                    <h2>{{ $product->name }}</h2>
                                    <button class="btn btn-danger" type="button">
                                        ${{ $product->price }}
                                    </button>
                                    <p>{{ $product->description }}</p>
                                    <p><a class="btn btn-default" href="{{ route('product', ['slug' => $product->slug]) }}" role="button">View details »</a></p>
                                </div><!--/.col-xs-6.col-lg-4-->
                            @endforeach
                            {!! $products->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
