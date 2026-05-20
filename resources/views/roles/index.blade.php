@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title mb-0">Roles</h4>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary">
                                <i class="las la-plus me-1"></i> New Role
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if($rows->count())
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th width="50">#</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th width="100" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <strong>{{ $row->name }}</strong>
                                            </td>
                                            <td>
                                                <span class="text-muted">{{ Str::limit($row->description ?? 'N/A', 50) }}</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('roles.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="las la-edit"></i>
                                                </a>
                                                <a href="{{ route('roles.destroy', $row->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                    <i class="las la-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted mb-0">No roles found.</p>
                            <a href="{{ route('roles.create') }}" class="btn btn-sm btn-primary mt-3">
                                <i class="las la-plus me-1"></i> Create First Role
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
