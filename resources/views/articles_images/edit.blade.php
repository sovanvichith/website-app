@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row mt-4">
        <div class="col-md-8 col-lg-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title mb-0">Edit Article Image</h4>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('article_images.index') }}" class="btn btn-sm btn-secondary">
                                <i class="las la-arrow-left me-1"></i> Back
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('article_images.update', $row->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="article_id" class="form-label">Article <span class="text-danger">*</span></label>
                            <select class="form-control @error('article_id') is-invalid @enderror"
                                    id="article_id" name="article_id" required>
                                <option value="">-- Select Article --</option>
                                @foreach($articles as $article)
                                    <option value="{{ $article->id }}" {{ old('article_id', $row->article_id) == $article->id ? 'selected' : '' }}>
                                        {{ $article->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('article_id')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image_path" class="form-label">Image</label>
                            <div class="mb-2">
                                @if($row->image_url)
                                    <div class="text-center mb-3">
                                        <p class="text-muted"><small>Current Image:</small></p>
                                        <img src="{{ $row->image_url }}" alt="Current Image" class="img-thumbnail" style="max-width: 250px; max-height: 250px;">
                                    </div>
                                @endif
                            </div>
                            <input type="file" class="form-control @error('image_path') is-invalid @enderror"
                                   id="image_path" name="image_path" accept="image/*"
                                   onchange="previewImage(event)">
                            @error('image_path')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Max 2MB. Leave blank to keep current image</small>
                        </div>

                        <div class="mb-3">
                            <div id="imagePreview" class="text-center d-none">
                                <p class="text-muted"><small>New Image Preview:</small></p>
                                <img id="previewImg" src="" alt="Preview" class="img-thumbnail" style="max-width: 250px; max-height: 250px;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror"
                                      id="description" name="description" rows="3" maxlength="200"
                                      placeholder="Enter image description (max 200 characters)">{{ $row->description ?? old('description') }}</textarea>
                            <small class="form-text text-muted">Max 200 characters</small>
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex gap-2 mt-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="las la-save me-1"></i> Update Image
                            </button>
                            <a href="{{ route('article_images.index') }}" class="btn btn-outline-secondary">
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

<script>
    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('previewImg').src = e.target.result;
                document.getElementById('imagePreview').classList.remove('d-none');
            }
            reader.readAsDataURL(file);
        }
    }
</script>
