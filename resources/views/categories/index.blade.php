@extends('layouts.app')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Categories</h2>
        <div class="card-body">

            @if ($message = Session::get('success'))
                <div class="alert alert-success" role="alert">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('categories.create') }}">
                    <i class="fa fa-plus"></i> Create New Category
                </a>
            </div>

            <form action="{{ route('categories.index') }}" method="GET" class="mt-3">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search categories" value="{{ request()->input('search') }}">
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i> Search</button>
                </div>
            </form>

            <table class="table table-bordered table-striped mt-4">
                <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Name</th>
                    <th width="250px">Action</th>
                </tr>
                </thead>

                <tbody>
                @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                                <a class="btn btn-info btn-sm" href="{{ route('categories.show', $category->id) }}">
                                    <i class="fa-solid fa-list"></i> Show
                                </a>
                                <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa-solid fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                @if($categories->isEmpty())
                    <tr>
                        <td colspan="3" class="text-center">There are no categories.</td>
                    </tr>
                @endif
                </tbody>
            </table>

            {!! $categories->withQueryString()->links('pagination::bootstrap-5') !!}

        </div>
    </div>
@endsection
