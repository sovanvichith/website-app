@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row mt-4">
        <div class="col-md-8 col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title mb-0">Edit Article</h4>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('articles.index') }}" class="btn btn-sm btn-secondary">
                                <i class="las la-arrow-left me-1"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('articles.update', $row->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" placeholder="Enter article title"
                                   value="{{ $row->title ?? old('title') }}" required>
                            @error('title')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category <span class="text-danger">*</span></label>
                            <select class="form-control @error('category_id') is-invalid @enderror"
                                    id="category_id" name="category_id" required>
                                <option value="">-- Select Category --</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id', $row->category_id) == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="content" class="form-label">Content</label>
                            <textarea class="form-control @error('content') is-invalid @enderror"
                                      id="content" name="content" rows="4"
                                      placeholder="Enter article content">{{ $row->content ?? old('content') }}</textarea>
                            @error('content')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="3" maxlength="200"
                                      placeholder="Enter article description (max 200 characters)" required>{{ $row->description ?? old('description') }}</textarea>
                            <small class="form-text text-muted">Max 200 characters</small>
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="las la-save me-1"></i> Update Article
                            </button>
                            <a href="{{ route('articles.index') }}" class="btn btn-outline-secondary">
                                <i class="las la-times me-1"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
