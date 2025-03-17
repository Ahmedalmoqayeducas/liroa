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
                                                    onclick="editContact({{ $contact->id }}, '{{ $contact->type }}', '{{ $contact->text }}')"
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

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // 1) CREATE Contact
        document.getElementById('showCreatePopup').addEventListener('click', function() {
            Swal.fire({
                title: 'Add New Contact',
                html: `
                    <select id="contactType" name="type" class="swal2-select">
                        <option value="phone">Phone</option>
                        <option value="email">Email</option>
                        <option value="address">Address</option>
                    </select>
                    <input type="text" id="contactText" class="swal2-input" placeholder="Enter text">
                `,
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Submit',
                cancelButtonText: 'Cancel',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    input: 'custom-swal-input',
                    confirmButton: 'custom-swal-confirm',
                    cancelButton: 'custom-swal-cancel'
                },
                preConfirm: () => {
                    const type = document.getElementById('contactType').value;
                    const text = document.getElementById('contactText').value;

                    if (!type || !text) {
                        Swal.showValidationMessage('All fields are required!');
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
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title'
                                }
                            }).then(() => location.reload());
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.response?.data?.message || 'An error occurred!',
                                icon: 'error',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title'
                                }
                            });
                        });
                }
            });
        });

        // 2) EDIT Contact
        function editContact(id, currentType, currentText) {
            Swal.fire({
                title: 'Edit Contact',
                html: `
                    <select id="contactType" class="swal2-select">
                        <option value="phone" ${currentType === 'phone' ? 'selected' : ''}>Phone</option>
                        <option value="email" ${currentType === 'email' ? 'selected' : ''}>Email</option>
                        <option value="address" ${currentType === 'address' ? 'selected' : ''}>Address</option>
                    </select>
                    <input type="text" id="contactText" class="swal2-input" value="${currentText}">
                `,
                focusConfirm: false,
                showCancelButton: true,
                confirmButtonText: 'Update',
                cancelButtonText: 'Cancel',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    input: 'custom-swal-input',
                    confirmButton: 'custom-swal-confirm',
                    cancelButton: 'custom-swal-cancel'
                },
                preConfirm: () => {
                    const type = document.getElementById('contactType').value;
                    const text = document.getElementById('contactText').value;

                    if (!type || !text) {
                        Swal.showValidationMessage('All fields are required!');
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
                    axios.put(`/dash/pages/contacts/${id}`, formData, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            Swal.fire({
                                title: response.data.status ? 'Success!' : 'Error!',
                                text: response.data.message,
                                icon: response.data.status ? 'success' : 'error',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title'
                                }
                            }).then(() => location.reload());
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.response?.data?.message || 'An error occurred!',
                                icon: 'error',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title'
                                }
                            });
                        });
                }
            });
        }

        // 3) DELETE Contact
        function deleteContact(id) {
            Swal.fire({
                title: 'Delete Contact?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    confirmButton: 'custom-swal-confirm',
                    cancelButton: 'custom-swal-cancel'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    axios.delete(`/dash/pages/contacts/${id}`, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            if (response.data.status) {
                                document.getElementById(`contact_${id}`).remove();
                            }
                            Swal.fire({
                                title: response.data.status ? 'Deleted!' : 'Error!',
                                text: response.data.message,
                                icon: response.data.status ? 'success' : 'error',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title'
                                }
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.response?.data?.message || 'An error occurred!',
                                icon: 'error',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title'
                                }
                            });
                        });
                }
            });
        }
    </script>

    <style>
        .custom-swal-popup {
            border: 2px solid #6c757d;
            border-radius: 10px;
        }

        .custom-swal-title {
            color: #007bff;
            font-weight: bold;
        }

        .custom-swal-input {
            border: 1px solid #6c757d !important;
            margin: 0.5em auto !important;
        }

        .custom-swal-confirm {
            background-color: #007bff !important;
        }

        .custom-swal-cancel {
            background-color: #6c757d !important;
        }
    </style>
@endsection
