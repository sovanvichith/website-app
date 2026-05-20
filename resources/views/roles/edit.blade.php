@extends('layouts.app')
@section('content')
    <div class="container-xxl">
        <div class="row mt-4">
            <div class="col-md-8 col-lg-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title mb-0">Edit Role</h4>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('roles.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="las la-arrow-left me-1"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('roles.update', $row->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" placeholder="Enter role name"
                                       value="{{ $row->name ?? old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="4"
                                          placeholder="Enter role description">{{ $row->description ?? old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="las la-save me-1"></i> Update Role
                                </button>
                                <a href="{{ route('roles.index') }}" class="btn btn-outline-secondary">
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
