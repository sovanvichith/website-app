@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title mb-0">Articles</h4>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('articles.create') }}" class="btn btn-primary">
                                <i class="las la-plus me-1"></i> Add Article
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($rows->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th style="width: 50px;">#</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th style="width: 120px;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($rows as $key => $row)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><strong>{{ $row->title }}</strong></td>
                                            <td>
                                                <span class="badge bg-info">{{ $row->category->name ?? 'N/A' }}</span>
                                            </td>
                                            <td>
                                                <small>{{ Str::limit($row->description, 50) }}</small>
                                            </td>
                                            <td>
                                                <div class="d-flex gap-1">
                                                    <a href="{{ route('articles.edit', $row->id) }}" class="btn btn-sm btn-warning" title="Edit">
                                                        <i class="las la-edit"></i>
                                                    </a>
                                                    <form action="{{ route('articles.destroy', $row->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Are you sure?')" title="Delete">
                                                            <i class="las la-trash-alt"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4">
                                                <p class="text-muted mb-2">No articles found</p>
                                                <a href="{{ route('articles.create') }}" class="btn btn-sm btn-primary">
                                                    <i class="las la-plus me-1"></i> Create First Article
                                                </a>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="alert alert-info" role="alert">
                            <strong>No articles yet!</strong> Click the "Add Article" button to create one.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
