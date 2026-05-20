@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row mt-4">
        <div class="col-md-8 col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title mb-0">Edit User</h4>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('users.index') }}" class="btn btn-sm btn-secondary">
                                <i class="las la-arrow-left me-1"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $row->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="role_id" class="form-label">Role <span class="text-danger">*</span></label>
                            <select class="form-control @error('role_id') is-invalid @enderror" id="role_id" name="role_id" required>
                                <option value="" disabled>Select Role</option>
                                @foreach($roles as $key => $role)
                                    <option value="{{ $key }}" {{ old('role_id', $row->role_id) == $key ? 'selected' : '' }}>{{ $role }}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                   id="name" name="name" placeholder="Enter full name"
                                   value="{{ $row->name ?? old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" placeholder="Enter email address"
                                   value="{{ $row->email ?? old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                   placeholder="Enter phone number" value="{{ $row->phone ?? old('phone') }}">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"
                                      placeholder="Enter address">{{ $row->address ?? old('address') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="profile" class="form-label">Profile Photo</label>
                            <input type="file" class="form-control" id="profile" name="profile" onchange="previewImage(event)">
                            <img id="previewImg" class="mt-2" width="100" src="{{ asset($row->profile) }}" style="display:block;" />
                            @error('profile')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="las la-save me-1"></i> Update User
                            </button>
                            <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                                <i class="las la-times me-1"></i> Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('previewImg');
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
