@extends('layouts.dashboard')
@section('content')
    <button id="showPopup" class="btn btn-primary">add a new role</button>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('admin.DataTable') }}</h3>
        </div>
        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table id="form" class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
                            <thead class="bg-slate-200 dark:bg-slate-700">
                                <tr>

                                    <th scope="col" class=" table-th ">
                                        #
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Name
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        Permissions
                                    </th>
                                    <th scope="col" class=" table-th ">
                                        Gurad Name
                                    </th>

                                    <th scope="col" class=" table-th ">
                                        operations
                                    </th>

                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-slate-100 dark:bg-slate-800 dark:divide-slate-700">

                                @foreach ($data as $ticket)
                                    <tr id="role_{{ $ticket->id }}">
                                        <td class="table-td">{{ $loop->index + 1 }}</td>
                                        <td class="table-td">{{ $ticket->name }}</td>
                                        <td class="table-td">{{ $ticket->permissions_count }}</td>
                                        <td class="table-td">{{ $ticket->guard_name }}</td>


                                        <td class="table-td ">
                                            <div class="flex space-x-3 rtl:space-x-reverse">
                                                <!-- زر تعديل الأذونات -->
                                                <a href="{{ route('role-permissions.edit', $ticket->id) }}"
                                                    class="action-btn btn-primary" title="Edit Permissions">
                                                    <iconify-icon icon="heroicons-outline:clipboard-list"></iconify-icon>
                                                    <!-- أيقونة قائمة الأذونات -->
                                                </a>

                                                <!-- زر تعديل الدور -->
                                                <button onclick="editRole({{ $ticket->id }}, '{{ $ticket->name }}')"
                                                    class="action-btn btn-warning" title="Edit Role">
                                                    <iconify-icon icon="heroicons-outline:pencil-alt"></iconify-icon>
                                                    <!-- أيقونة تعديل -->
                                                </button>

                                                <!-- زر الحذف -->
                                                <button onclick="destroy({{ $ticket->id }})" class="action-btn btn-danger"
                                                    title="Delete Role">
                                                    <iconify-icon icon="heroicons-outline:trash"></iconify-icon>
                                                    <!-- أيقونة حذف -->
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
    <!-- /.card-body -->
    <script>
        document.getElementById('showPopup').addEventListener('click', function() {
            // عرض SweetAlert2
            Swal.fire({
                title: 'Add New Role',
                text: 'Enter the Name of the Role',
                input: 'text',
                inputPlaceholder: 'Enter Role Name',
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
                inputValidator: (value) => {
                    if (!value) {
                        return 'Please enter a role name!';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const roleName = result.value; // القيمة المدخلة في الحقل

                    // إرسال طلب باستخدام Axios لإنشاء الدور الجديد
                    axios.post(`{{ route('Roles.store') }}`, {
                            name: roleName
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF Token
                            }
                        })
                        .then(response => {
                            Swal.fire({
                                title: response.data.status ? 'Success!' : 'Error!',
                                text: response.data.message, // عرض الرسالة من الاستجابة
                                icon: response.data.status ? 'success' : 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            }).then(() => {
                                if (response.data.status) {
                                    // إعادة تحميل الصفحة لتحديث قائمة الأدوار عند النجاح
                                    location.reload();
                                    // document.getElementById('form').reset();
                                }
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.response ? error.response.data.message :
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


    <style>
        /* تصميم النافذة */
        .custom-swal-popup {
            border: 2px solid #6c757d;
            /* حدود رمادية */
            border-radius: 10px;
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
    <script>
        function editRole(roleId, currentName) {
            // عرض SweetAlert2 لطلب اسم جديد
            Swal.fire({
                title: 'Edit Role',
                text: 'Enter the new name for the role',
                input: 'text',
                inputValue: currentName, // الاسم الحالي كقيمة افتراضية
                inputPlaceholder: 'Enter new role name',
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
                inputValidator: (value) => {
                    if (!value) {
                        return 'Please enter a role name!';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const newRoleName = result.value; // القيمة المدخلة في الحقل

                    // إرسال طلب باستخدام Axios لتحديث الدور
                    axios.put(`/dash/Roles/${roleId}`, {
                            name: newRoleName
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF Token
                            }
                        })
                        .then(response => {
                            Swal.fire({
                                title: response.data.status ? 'Success!' : 'Error!',
                                text: response.data.message, // عرض الرسالة من الاستجابة
                                icon: response.data.status ? 'success' : 'error',
                                background: '#ffffff',
                                customClass: {
                                    popup: 'custom-swal-popup',
                                    title: 'custom-swal-title',
                                    text: 'custom-swal-text'
                                }
                            }).then(() => {
                                if (response.data.status) {
                                    // إعادة تحميل الصفحة لتحديث قائمة الأدوار
                                    // document.getElementById('form').reset();
                                    location.reload();
                                }
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: 'Error!',
                                text: error.response ? error.response.data.message :
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
    <script>
        function destroy(id) {
            axios.delete(`/dash/Roles/${id}`).then(function(response) {
                document.getElementById(`role_${id}`).remove();
                toastr.success(response.data.message);
            }).catch(function(error) {
                toastr.error(error.response.data.message);
            })
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('dashboard/sweetalert2/sweetalert2.min.js') }}"></script>
@endsection

@section('css')
    {{-- <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('dashboard/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
