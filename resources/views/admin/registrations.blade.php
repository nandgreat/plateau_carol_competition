@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2>Manage Child Registrations</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('info'))
        <div class="alert alert-info">{{ session('info') }}</div>
    @endif

    <form method="GET" action="{{ route('admin.registrations') }}" class="mb-3">
        <label>Select Stage:</label>
        <select name="stage" class="form-select d-inline-block w-auto" onchange="this.form.submit()">
            @foreach($stages as $s)
                <option value="{{ $s }}" {{ $stage == $s ? 'selected' : '' }}>{{ $s }}</option>
            @endforeach
        </select>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Full Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>LGA</th>
                <th>Interest</th>
                <th>Stage</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registrations as $child)
            <tr>
                <td>{{ $child->fullname }}</td>
                <td>{{ $child->age }}</td>
                <td>{{ $child->gender }}</td>
                <td>{{ $child->lga }}</td>
                <td>{{ $child->interest_area }}</td>
                <td>{{ $child->stage }}</td>
                <td>
                    @if($child->stage !== 'Final')
                    <form method="POST" action="{{ route('admin.promote', $child->id) }}">
                        @csrf
                        <button class="btn btn-sm btn-success">Promote</button>
                    </form>
                    @else
                        <span class="text-muted">Finalist</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $registrations->links() }}
</div>
@endsection
