@extends('layouts.app')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Products</h2>
        <div class="card-body">

            <form method="GET" action="{{ route('products.index') }}" class="mb-3">
                <div class="input-group">
                    <!-- Search by Name -->
                    <input type="text" name="search" class="form-control" placeholder="Search products by name" value="{{ request('search') }}">

                    <!-- Search by Category -->
                    <select name="category" class="form-select">
                        <option value="">-- Select Category --</option>
                        @foreach($categories as $id => $name)
                            <option value="{{ $name }}" {{ request('category') == $name ? 'selected' : '' }}>
                                {{ $name }}
                            </option>
                        @endforeach
                    </select>

                    <!-- Min Price -->
                    <input type="number" name="minPrice" class="form-control" placeholder="Min price" value="{{ request('minPrice') }}">

                    <!-- Max Price -->
                    <input type="number" name="maxPrice" class="form-control" placeholder="Max price" value="{{ request('maxPrice') }}">

                    <!-- Search Button -->
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
            </form>


            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('products.create') }}"> <i class="fa fa-plus"></i> Create New Product</a>
            </div>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Details</th>
                    <th width="250px">Action</th>
                </tr>
                </thead>

                <tbody>
                @forelse ($products as $product)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td><img src="/images/{{ $product->image }}" width="100px"></td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->detail }}</td>
                        <td>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('products.show', $product->id) }}"><i class="fa-solid fa-list"></i> Show</a>
                                <a class="btn btn-primary btn-sm" href="{{ route('products.edit', $product->id) }}"><i class="fa-solid fa-pen-to-square"></i> Edit</a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8">There are no products available.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>

            {!! $products->withQueryString()->links('pagination::bootstrap-5') !!}

        </div>
    </div>
@endsection
