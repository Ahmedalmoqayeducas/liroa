@extends('layouts.dashboard')
@section('content')
    <button id="showPopup" class="btn btn-primary">add a new Role</button>
    <div class="card">
        <header class=" card-header noborder">
            <h4 class="card-title">Table Head
            </h4>
        </header>
        <!-- زر لفتح الـ Popup -->
        {{-- <button id="openPopup" class="btn btn-primary">إنشاء صفحة جديدة</button> --}}
        <!-- زر عرض SweetAlert -->

        <div class="card-body px-6 pb-6">
            <div class="overflow-x-auto -mx-6">
                <div class="inline-block min-w-full align-middle">
                    <div class="overflow-hidden ">
                        <table class="min-w-full divide-y divide-slate-100 table-fixed dark:divide-slate-700">
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


                                        <td class="table-td">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <a>
                                                    <a class="btn btn-primary"
                                                        href="{{ route('role-permissions.edit', $ticket->id) }}">
                                                        <i class="fas fa-list"></i></a>
                                                </a>
                                                <a>
                                                    <a class="btn btn-warning"
                                                        href="{{ route('Roles.edit', $ticket->id) }}">
                                                        <i class="fas fa-pencil-alt"></i></a>
                                                </a>

                                                <button onclick="destroy({{ $ticket->id }})" class="btn btn-danger">
                                                    <i class="fas fa-trash"></i></button>

                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
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

    <script src="{{ asset('dashboard/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        document.getElementById('showPopup').addEventListener('click', function() {
            // عرض SweetAlert2
            Swal.fire({
                title: 'Create New Role ',
                text: 'Enter The Name Of The Role',
                input: 'text',
                inputPlaceholder: 'Enter Here   ',
                showCancelButton: true,
                confirmButtonText: 'done',
                cancelButtonText: 'cancel',
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
                        return 'Enter The Name!';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const pageName = result.value; // القيمة المدخلة في الحقل

                    // إرسال طلب باستخدام Axios
                    axios.post(`{{ route('Roles.store') }}`, {
                            name: pageName
                        }, {
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Laravel CSRF Token
                            }
                        })
                        .then(response => {

                            if (response.data.success) {

                                Swal.fire({
                                    title: 'done!',
                                    text: 'Role Has Been Created Successfully',
                                    icon: 'success',
                                    background: '#ffffff',
                                    customClass: {
                                        popup: 'custom-swal-popup',
                                        title: 'custom-swal-title',
                                        text: 'custom-swal-text'
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Role Saving Has Been Failed',
                                    icon: 'error',
                                    background: '#ffffff', // خلفية بيضاء لرسالة الخطأ
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
                                text: 'Error On Connection.',
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


    <!-- CSS مخصص -->
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
@endsection
@section('style')
    <link rel="stylesheet" href="{{ asset('dashboard/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endsection
