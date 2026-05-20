@extends('layouts.app')
@section('content')
    <div class="container-xxl">
        <div class="row mt-4">
            <div class="col-md-8 col-lg-8 offset-md-2">
                <div class="card">
                    <div class="card-header bg-light">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title mb-0">Add Article Image</h4>
                            </div>
                            <div class="col-auto">
                                <a href="{{ route('article_images.index') }}" class="btn btn-sm btn-secondary">
                                    <i class="las la-arrow-left me-1"></i> Back
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('article_images.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="article_id" class="form-label">Article <span class="text-danger">*</span></label>
                                <select class="form-control @error('article_id') is-invalid @enderror"
                                        id="article_id" name="article_id" required>
                                    <option value="">-- Select Article --</option>
                                    @foreach($articles as $article)
                                        <option value="{{ $article->id }}" {{ old('article_id') == $article->id ? 'selected' : '' }}>
                                            {{ $article->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('article_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image_path" class="form-label">Image <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <input type="file" class="form-control @error('image_path') is-invalid @enderror"
                                           id="image_path" name="image_path" accept="image/*" required
                                           onchange="previewImage(event)">
                                </div>
                                @error('image_path')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                                <small class="form-text text-muted">Max 2MB. Allowed: JPG, PNG, GIF</small>
                            </div>

                            <div class="mb-3">
                                <div id="imagePreview" class="text-center d-none">
                                    <img id="previewImg" src="" alt="Preview" class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description" rows="3" maxlength="200"
                                          placeholder="Enter image description (max 200 characters)">{{ old('description') }}</textarea>
                                <small class="form-text text-muted">Max 200 characters</small>
                                @error('description')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="las la-save me-1"></i> Save Image
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
