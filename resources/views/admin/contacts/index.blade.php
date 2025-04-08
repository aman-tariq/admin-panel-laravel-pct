@extends('admin.layouts.master_view')

@section('header_links')
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css" integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('main_content')
    <h1>Contact Leads</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->message }}</td>
                    <td>
                        <!-- Edit Button triggers Modal -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal" 
                                data-name="{{ $contact->name }}" 
                                data-email="{{ $contact->email }}" 
                                data-phone="{{ $contact->phone }}" 
                                data-message="{{ $contact->message }}" 
                                data-id="{{ $contact->id }}">
                            Edit
                        </button>

                        <!-- Delete Form -->
                        <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal for Edit Contact -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Contact</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.contacts.update', 'contact_id_placeholder') }}" method="POST" id="editContactForm">
                        @csrf
                        @method('PUT')
                        
                        <input type="hidden" name="id" id="contact-id">
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer_links')
    <!-- Bootstrap JS Bundle (Including Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget; 
            var contactId = button.getAttribute('data-id');
            var contactName = button.getAttribute('data-name');
            var contactEmail = button.getAttribute('data-email');
            var contactPhone = button.getAttribute('data-phone');
            var contactMessage = button.getAttribute('data-message');

            var form = document.getElementById('editContactForm');
            form.action = form.action.replace('contact_id_placeholder', contactId);
            
            document.getElementById('contact-id').value = contactId;
            document.getElementById('name').value = contactName;
            document.getElementById('email').value = contactEmail;
            document.getElementById('phone').value = contactPhone;
            document.getElementById('message').value = contactMessage;
        });
    </script>
@endsection
