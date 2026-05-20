@extends('layouts.app')
@section('content')
<div class="container-xxl">
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header bg-light">
                    <div class="row align-items-center">
                        <div class="col">
                            <h4 class="card-title mb-0">Users</h4>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary">
                                <i class="las la-plus me-1"></i> New User
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
                                        <th width="80">Profile</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th width="100" class="text-end">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($rows as $index => $row)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($row->profile) }}" alt="{{ $row->name }}" width="60" height="60" class="rounded-circle object-fit-cover" />
                                            </td>
                                            <td>
                                                <strong>{{ $row->name }}</strong>
                                            </td>
                                            <td>
                                                <span class="text-muted">{{ $row->email }}</span>
                                            </td>
                                            <td>
                                                <span class="badge bg-info">{{ $row->role?->name ?? 'N/A' }}</span>
                                            </td>
                                            <td class="text-end">
                                                <a href="{{ route('users.edit', $row->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="las la-edit"></i>
                                                </a>
                                                <form action="{{ route('users.destroy', $row->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">
                                                        <i class="las la-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <p class="text-muted mb-0">No users found.</p>
                            <a href="{{ route('users.create') }}" class="btn btn-sm btn-primary mt-3">
                                <i class="las la-plus me-1"></i> Create First User
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
