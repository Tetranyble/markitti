@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @forelse($products as $product)
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <h1><a href="{{ route('product.show', $product) }}">{{ $product->name }}</a></h1>
                        <h4>{{ $product->price }}</h4>
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
                @empty
                    <p>No product data</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
