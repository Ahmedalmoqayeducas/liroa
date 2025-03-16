@extends('layouts.dashboard')
@section('content')
    <!-- Button to show Create modal (SweetAlert) -->
    <button id="showCreatePopup" class="btn btn-primary">Add a New Contact</button>

    <div class="card mt-4">
        <div class="card-header">
            <h3 class="card-title">Contacts DataTable</h3>
        </div>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table id="contactTable"
                            class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th scope="col" class="table-th"> # </th>
                                    <th scope="col" class="table-th"> type </th>
                                    <th scope="col" class="table-th"> text </th>

                                    <th scope="col" class="table-th"> Operations </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach ($data as $contact)
                                    <tr id="contact_{{ $contact->id }}">
                                        <td class="table-td">{{ $loop->iteration }}</td>
                                        <td class="table-td">{{ $contact->type }}</td>
                                        <td class="table-td">{{ $contact->text }}</td>

                                        <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <!-- Edit Button -->
                                                <button
                                                    onclick="editContact({{ $contact->id }}, '{{ $contact->name }}', '{{ $contact->email }}', '{{ $contact->phone }}')"
                                                    class="action-btn btn-warning" title="Edit Contact">
                                                    <iconify-icon icon="heroicons-outline:pencil-alt"></iconify-icon>
                                                </button>
                                                <!-- Delete Button -->
                                                <button onclick="deleteContact({{ $contact->id }})"
                                                    class="action-btn btn-danger" title="Delete Contact">
                                                    <iconify-icon icon="heroicons-outline:trash"></iconify-icon>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Laravel pagination links -->
                        <div class="container mt-3">
                            {{ $data->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Include SweetAlert2 from CDN (or your local asset) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Include Axios from CDN (or your local asset) -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // 1) CREATE Contact
        document.getElementById('showCreatePopup').addEventListener('click', function() {
            Swal.fire({
                title: 'Add New Contact',
                html: `
                    <select type="text" id="contactType" class="swal2-select" placeholder="type">
                        <option value="phone">phone</option>
                        <option value="email">email</option>
                        <option value="address">address</option>
                        </select>
                    <input type="text" id="contactText" class="swal2-input" placeholder="text">
                `,
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Submit',
                cancelButtonText: 'Cancel',
                background: '#ffffff',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    text: 'custom-swal-text',
                    input: 'custom-swal-input',
                    confirmButton: 'custom-swal-confirm',
                    cancelButton: 'custom-swal-cancel'
                },
                preConfirm: () => {
                    const name = document.getElementById('contactType').value;
                    const email = document.getElementById('contactText').value;
                    if (!name) {
                        Swal.showValidationMessage('Please enter a name!');
                        return false;
                    }
                    return {
                        type,
                        text
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = result.value;

                    axios.post(`{{ route('contacts.store') }}`, formData, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            Swal.fire({
                                title: response.data.status ? 'Success!' : 'Error!',
                                text: response.data.message,
                                icon: response.data.status ? 'success' : 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            }).then(() => {
                                if (response.data.status) {
                                    // Reload to see the new contact
                                    location.reload();
                                }
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.response?.data?.message ??
                                    'An error occurred while connecting to the server.',
                                icon: 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            });
                            console.error('Error:', error.response?.data ?? error.message);
                        });
                }
            });
        });

        // 2) EDIT Contact
        function editContact(id, currentType, currentText) {
            Swal.fire({
                title: 'Edit Contact',
                html: `
                    <select type="text" id="contactType" class="swal2-select" value="${currentType}" placeholder="type">
                        <option value="phone">phone</option>
                        <option value="email">email</option>
                        <option value="address">address</option>
                        </select>
                    <input type="text" id="contactText" class="swal2-input" value="${currentText}" placeholder="text">
                `,
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Update',
                cancelButtonText: 'Cancel',
                background: '#ffffff',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    text: 'custom-swal-text',
                    input: 'custom-swal-input',
                    confirmButton: 'custom-swal-confirm',
                    cancelButton: 'custom-swal-cancel'
                },
                preConfirm: () => {
                    const name = document.getElementById('contactType').value;
                    const email = document.getElementById('contactText').value;
                    if (!name) {
                        Swal.showValidationMessage('Please enter a name!');
                        return false;
                    }
                    return {
                        type,
                        text
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const formData = result.value;

                    axios.put(`contacts/${id}`, formData, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            Swal.fire({
                                title: response.data.status ? 'Success!' : 'Error!',
                                text: response.data.message,
                                icon: response.data.status ? 'success' : 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            }).then(() => {
                                if (response.data.status) {
                                    // Reload to see the updated contact
                                    location.reload();
                                }
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.response?.data?.message ??
                                    'An error occurred while connecting to the server.',
                                icon: 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            });
                            console.error('Error:', error.response?.data ?? error.message);
                        });
                }
            });
        }

        // 3) DELETE Contact
        function deleteContact(id) {
            // Confirm before deleting (optional)
            Swal.fire({
                title: 'Delete Contact?',
                text: "Are you sure you want to delete this contact?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, Delete',
                cancelButtonText: 'Cancel',
                background: '#ffffff',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    text: 'custom-swal-text',
                    confirmButton: 'custom-swal-confirm',
                    cancelButton: 'custom-swal-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`contacts/${id}`, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            // If you want to remove the row from the table without reloading:
                            if (response.data.status) {
                                document.getElementById(`contact_${id}`).remove();
                            }
                            Swal.fire({
                                title: response.data.status ? 'Success!' : 'Error!',
                                text: response.data.message,
                                icon: response.data.status ? 'success' : 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.response?.data?.message ??
                                    'An error occurred while connecting to the server.',
                                icon: 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            });
                            console.error('Error:', error.response?.data ?? error.message);
                        });
                }
            });
        }
    </script>

    <!-- Optional styling for SweetAlert2 -->
    <style>
        /* Popup design */
        .custom-swal-popup {
            border: 2px solid #6c757d;
            /* gray border */
            border-radius: 10px;
        }

        /* Title */
        .custom-swal-title {
            color: #007bff;
            /* blue color */
            font-weight: bold;
        }

        /* Text */
        .custom-swal-text {
            color: #000;
            /* black color */
        }

        /* Input field */
        .custom-swal-input {
            border: 1px solid #6c757d;
            /* gray border for input */
        }

        /* Confirm button */
        .custom-swal-confirm {
            background-color: #007bff;
            /* blue */
            color: #fff;
        }

        /* Cancel button */
        .custom-swal-cancel {
            background-color: #6c757d;
            /* gray */
            color: #fff;
        }
    </style>
@endsection
