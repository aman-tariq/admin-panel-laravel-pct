@extends('admin.layouts.master_view')
@section('main_content')
    <div class="container-fluid">
        <h1>Career Applications</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card">
            <div class="card-header"><h3><strong>Career Leads</strong></h3></div>
            <div class="card-body">
                @if ($careers->isEmpty())
                    <p>No career applications yet.</p>
                @else
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Experience</th>
                                <th>Skills</th>
                                <th>Message</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($careers as $career)
                                <tr>
                                    <td>{{ $career->name }}</td>
                                    <td>{{ $career->email }}</td>
                                    <td>{{ $career->phone }}</td>
                                    <td>{{ $career->experience }}</td>
                                    <td>{{ $career->skills }}</td>
                                    <td>{{ $career->message ?? 'N/A' }}</td>
                                    <td>
                                        <form action="{{ route('admin.careers.destroy', $career->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
@endsection