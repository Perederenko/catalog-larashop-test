@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h1 class="text-center">{{ $product->name }}</h1>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12">

                                <img src="{{ $product->getImage() }}" alt="{{ $product->photo }}"class="img-thumbnail">
                                <p>{{ $product->description }}</p>
                                <button class="btn btn-danger" type="button">
                                    ${{ $product->price }}
                                </button>
                                @if(count($product->characteristics))
                                    <h5>Characteristics:</h5>
                                    @foreach($product->characteristics as $char)
                                        {{ $char->name }}:{{ $char->pivot->value }}
                                        <br>
                                    @endforeach
                                @endif
                            </div><!--/.col-xs-6.col-lg-4-->
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="text-center">More Products</h3>
                    </div>

                    <div class="panel-body">
                        <div class="row">
                            @foreach($products as $product)
                                <div class="col-sm-6 col-md-3">
                                    <div class="thumbnail">
                                        <img src="{{ $product->getImage() }}" alt="{{ $product->photo }}">
                                        <div class="caption">
                                            <h2>{{ $product->name }}</h2>
                                            <p>{{ $product->description }}</p>
                                            <p><a class="btn btn-default" href="{{ route('product', ['slug' => $product->slug]) }}" role="button">View details »</a></p>
                                        </div>
                                    </div>
                                </div><!--/.col-sm-6.col-md-3-->
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
