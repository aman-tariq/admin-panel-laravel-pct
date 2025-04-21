@extends('admin.layouts.master_view')
@section('main_content')
    <div class="container-fluid text-dark ">
        <h1>Manage Menus</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Add Menu Form -->
        <div class="card mb-4">
            <div class="card-header"><h3><strong>Add New Menu Item</strong></h3></div>
            <div class="card-body">
                <form action="{{ route('admin.menus.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url" name="url" required>
                    </div>
                    <div class="mb-3">
                        <label for="order" class="form-label">Order</label>
                        <input type="number" class="form-control" id="order" name="order" required>
                    </div>
                    <div class="mb-3">
                        <label for="type" class="form-label">Type</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="admin">Admin</option>
                            <option value="user">Website</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Menu Item</button>
                </form>
            </div>
        </div>

        <!-- Menu List -->
        <div class="card  text-dark">
            <div class="card-header">Existing Menu Items</div>
            <div class="card-body">
                <table class="table table-bordered text-dark">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>URL</th>
                            <th>Order</th>
                            <th>Type</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($menus as $menu)
                            <tr>
                                <td>{{ $menu->title }}</td>
                                <td>{{ $menu->url }}</td>
                                <td>{{ $menu->order }}</td>
                                <td>{{ ucfirst($menu->type) }}</td>
                                <td>
                                    <form action="{{ route('admin.menus.delete', $menu->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection