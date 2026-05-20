@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row mt-4">
        <div class="col-md-8 col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title mb-0">Website Settings</h4>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">
                                <i class="las la-arrow-left me-1"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('settings.update', $row->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Website Title <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                   id="title" name="title" placeholder="Enter website title"
                                   value="{{ $row->title ?? old('title') }}" required>
                            @error('title')
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
                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                   id="phone" name="phone" placeholder="Enter phone number"
                                   value="{{ $row->phone ?? old('phone') }}" required>
                            @error('phone')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="telegram" class="form-label">Telegram</label>
                            <input type="text" class="form-control" id="telegram" name="telegram"
                                   placeholder="Enter Telegram URL or username"
                                   value="{{ $row->telegram ?? old('telegram') }}">
                        </div>

                        <div class="mb-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="text" class="form-control" id="facebook" name="facebook"
                                   placeholder="Enter Facebook URL"
                                   value="{{ $row->facebook ?? old('facebook') }}">
                        </div>

                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="text" class="form-control" id="instagram" name="instagram"
                                   placeholder="Enter Instagram URL or username"
                                   value="{{ $row->instagram ?? old('instagram') }}">
                        </div>

                        <div class="mb-3">
                            <label for="youtube" class="form-label">YouTube</label>
                            <input type="text" class="form-control" id="youtube" name="youtube"
                                   placeholder="Enter YouTube URL or channel"
                                   value="{{ $row->youtube ?? old('youtube') }}">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="4"
                                      placeholder="Enter website description">{{ $row->description ?? old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Logo</label>
                            <input type="file" class="form-control @error('logo') is-invalid @enderror"
                                   id="logo" name="logo" onchange="previewImage(event)">
                            <img id="previewImg" class="mt-2" width="150" src="{{ asset($row->logo) }}" style="display:block;" />
                            @error('logo')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="las la-save me-1"></i> Save Settings
                            </button>
                            <a href="{{ route('home') }}" class="btn btn-outline-secondary">
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
