@extends('layouts.dashboard')
@section('content')
    <button id="showPopup" class="btn btn-primary">Add a new page</button>
    {{-- Add this near the "Add New Page" button --}}
    <a href="{{ route('pages.trash') }}" class="btn btn-warning">
        View Trash
        {{-- ({{ Page::onlyTrashed()->count() }}) --}}
    </a>

    <div class="card">
        <header class="card-header noborder">
            <h4 class="card-title">Pages List</h4>
        </header>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>
                                    <th class="table-th">ID</th>
                                    <th class="table-th">Page Name</th>
                                    <th class="table-th">Type</th>
                                    <th class="table-th">Operations</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">
                                @foreach ($data as $element)
                                    <tr id="element_{{ $element->id }}">
                                        <td class="table-td">{{ $loop->index + 1 }}</td>
                                        <td class="table-td">{{ $element->name }}</td>
                                        <td class="table-td">{{ $element->type }}</td>
                                        <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <a href="{{ route('page-posts.edit', $element->id) }}"
                                                    class="action-btn btn-primary ">
                                                    <iconify-icon icon="heroicons-outline:clipboard-list"></iconify-icon>
                                                </a>
                                                <a href="{{ route('pages.show', $element->id) }}"
                                                    class="action-btn btn-success ">
                                                    <iconify-icon icon="heroicons:eye"></iconify-icon>
                                                </a>

                                                <button type="button"
                                                    onclick="editPage('{{ $element->id }}', '{{ $element->name }}')"
                                                    class="action-btn btn-warning">
                                                    <iconify-icon icon="heroicons:pencil-square"></iconify-icon>
                                                </button>

                                                <button type="button" onclick="destroy({{ $element->id }})"
                                                    class="action-btn btn-danger">
                                                    <iconify-icon icon="heroicons:trash"></iconify-icon>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="container">
                            {{ $data->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {{-- 1) EDIT PAGE SCRIPT --}}
    <script>
        function editPage(pageId, currentName, currentType) {
            Swal.fire({
                title: 'Edit Page',
                html: `
                    <input id="swal-input1" class="swal2-input" placeholder="Page Name" value="${currentName}">
                    <select id="swal-input2" class="swal2-select">
                        <option value="projects" ${currentType === 'projects' ? 'selected' : ''}>Projects</option>
                        <option value="expertise" ${currentType === 'expertise' ? 'selected' : ''}>Expertise</option>
                    </select>
                `,
                showCancelButton: true,
                confirmButtonText: 'Update',
                cancelButtonText: 'Cancel',
                focusConfirm: false,
                preConfirm: () => {
                    return {
                        name: document.getElementById('swal-input1').value,
                        type: document.getElementById('swal-input2').value
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const {
                        name,
                        type
                    } = result.value;

                    axios.put(`/dash/pages/${pageId}`, {
                            name: name,
                            type: type
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            Swal.fire({
                                title: response.data.success ? 'Success!' : 'Error!',
                                text: response.data.message,
                                icon: response.data.success ? 'success' : 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            }).then(() => {
                                if (response.data.success) {
                                    location.reload();
                                }
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.response ?
                                    error.response.data.message :
                                    'An error occurred while connecting to the server.',
                                icon: 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            });
                            console.error('Error:', error.response ? error.response.data : error.message);
                        });
                }
            });
        }
    </script>

    {{-- 2) DELETE PAGE SCRIPT (SweetAlert2 Confirmation) --}}
    <script>
        function destroy(id) {
            Swal.fire({
                title: 'Delete Page?',
                text: 'Are you sure you want to delete this page?',
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
                    axios.delete(`/dash/pages/${id}`, {
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    }).then(function(response) {
                        // If deletion was successful, remove the row from the table
                        if (response.data.success) {
                            const row = document.getElementById(`element_${id}`);
                            if (row) row.remove();
                        }

                        Swal.fire({
                            title: response.data.success ? 'Success!' : 'Error!',
                            text: response.data.message,
                            icon: response.data.success ? 'success' : 'error',
                            background: '#ffffff',
                            customClass: {
                                popup: 'custom-swal-popup',
                                title: 'custom-swal-title',
                                text: 'custom-swal-text'
                            }
                        });
                    }).catch(function(error) {
                        Swal.fire({
                            title: 'Error!',
                            text: error.response ?
                                error.response.data.message :
                                'An error occurred while connecting to the server.',
                            icon: 'error',
                            background: '#ffffff',
                            customClass: {
                                popup: 'custom-swal-popup',
                                title: 'custom-swal-title',
                                text: 'custom-swal-text'
                            }
                        });
                        console.error('Error:', error.response ? error.response.data : error.message);
                    });
                }
            });
        }
    </script>

    {{-- 3) CREATE PAGE SCRIPT --}}
    <script>
        document.getElementById('showPopup').addEventListener('click', function() {
            Swal.fire({
                title: 'Create Page',
                html: `
                    <input id="swal-input1" class="swal2-input" placeholder="Page Name">
                    <select id="swal-input2" class="swal2-select">
                        <option value="projects">Projects</option>
                        <option value="expertise">Expertise</option>
                    </select>
                `,
                showCancelButton: true,
                confirmButtonText: 'Create',
                cancelButtonText: 'Cancel',
                focusConfirm: false,
                preConfirm: () => {
                    return {
                        name: document.getElementById('swal-input1').value,
                        type: document.getElementById('swal-input2').value
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const {
                        name,
                        type
                    } = result.value;

                    axios.post(`{{ route('pages.store') }}`, {
                            name: name,
                            type: type
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            if (response.data.message) {
                                Swal.fire({
                                    title: 'done!',
                                    text: 'Page Has Been Created Successfully',
                                    icon: 'success',
                                    background: '#ffffff',
                                    customClass: {
                                        popup: 'custom-swal-popup',
                                        title: 'custom-swal-title',
                                        text: 'custom-swal-text'
                                    }
                                }).then(() => {
                                    // Reload to see the new page in the table
                                    location.reload();
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Page Failed To Create',
                                    icon: 'error',
                                    background: '#ffffff',
                                    customClass: {
                                        popup: 'custom-swal-popup',
                                        title: 'custom-swal-title',
                                        text: 'custom-swal-text'
                                    }
                                });
                            }
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
                            console.error('Error:', error.response ? error.response.data : error
                                .message);
                        });
                }
            });
        });
    </script>

    <script src="{{ asset('dashboard/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- CSS for SweetAlert2 -->
    <style>
        /* تصميم النافذة */
        .custom-swal-popup {
            border: 2px solid #6c757d;
            /* حدود رمادية */
            border-radius: 10px;
            background-color: #ffffff;
        }

        /* عنوان النافذة */
        .custom-swal-title {
            color: #007bff;
            /* أزرق */
            font-weight: bold;
        }

        /* النص داخل النافذة */
        .custom-swal-text {
            color: #000;
            /* أسود */
        }

        /* حقل الإدخال */
        .custom-swal-input {
            border: 1px solid #6c757d;
            /* حدود رمادية لحقل الإدخال */
        }

        /* زر التأكيد */
        .custom-swal-confirm {
            background-color: #007bff;
            /* أزرق */
            color: #fff;
        }

        /* زر الإلغاء */
        .custom-swal-cancel {
            background-color: #6c757d;
            /* رمادي */
            color: #fff;
        }
    </style>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('dashboard/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
