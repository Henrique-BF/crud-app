@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 8 CRUD </h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}" title="Go back">Products</a>
                <a class="btn btn-success" href="{{ route('categories.create') }}" title="Create a category"><i class="fas fa-plus-circle"></i></a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>description</th>
            <th>Date Created</th>
            <th>Actions</th>
        </tr>
        @forelse ($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->created_at->format('d/m/Y') }}</td>
                <td>
                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">

                        <a href="{{ route('categories.show', $category->id) }}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{ route('categories.edit', $category->id) }}" title="edit">
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" class="border-none bg-transparent">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <p>There is no categories, try register the first one.</p>
        @endforelse
    </table>
    <div>
        {!! $categories->links() !!}
    </div>
@endsection
