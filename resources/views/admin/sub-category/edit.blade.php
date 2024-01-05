@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Sub Category</h4>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{ route('admin.sub-category.update', $subCategory->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label>Category</label>
                                    <select class="form-control" name="category">
                                        <option value="">Select</option>
                                        @foreach($categories as $category)
                                            <option {{ $category->id == $subCategory->category_id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $subCategory->name }}">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option {{ $subCategory->status == 1 ? 'selected': '' }} value="1">Active</option>
                                        <option {{ $subCategory->status == 0 ? 'selected': '' }} value="0">Inactive</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
