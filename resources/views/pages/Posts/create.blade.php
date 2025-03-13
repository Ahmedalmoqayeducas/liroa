<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summernote Text Editor CRUD and Image Upload in Laravel</title>
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    {{-- <script src="{{ asset('dashboard/sweetalert2/sweetalert2.min.js') }}"></script> --}}
    {{-- <link rel="stylesheet" href="{{ asset('dashboard/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}"> --}}
</head>

<body>

    <div class="container p-4 ">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 class="">كتابة منشورات داخل الصفحات الرئيسية </h1>
                </div>
                <a href="{{ route('posts.index') }}" class="btn btn-lg btn-danger">
                    الرجوع لعرض المنشورات
                </a>
                <form action="{{ route('posts.index') }}" method="post">

                    <br>
                    @csrf
                    <label for="">العنوان:</label>
                    <br>

                    <input type="text" class="form-control" name="title">
                    <br>
                    <label for="">بنية المنشور:</label>
                    <br>
                    <textarea name="description" id="description" cols="30" rows="15"></textarea>
                    <br>

                    <button type="submit" class="btn btn-lg btn-primary">حفظ</button>
                </form>
                {{-- <button id="showPopup" class="btn btn-primary">اضافة هذا المنشور الى صفحة النشاطات</button> --}}
            </div>
        </div>
    </div>


    <script>
        $('#description').summernote({
            placeholder: 'description...',
            tabsize: 2,
            height: 300
        });
    </script>
    {{-- <script>
        document.getElementById('showPopup').addEventListener('click', function() {
            Swal.fire({
                title: 'اضافة المنشور الى صفحة النشاطات',
                text: 'هل تريد اضافة هذا المنشور الى صفحة نشاطات الجمعية ؟',
                showCancelButton: true,
                confirmButtonText: ' نعم',
                cancelButtonText: 'لا اريد',
                background: '#ffffff',
                customClass: {
                    popup: 'custom-swal-popup',
                    title: 'custom-swal-title',
                    text: 'custom-swal-text',
                    confirmButton: 'custom-swal-confirm',
                    cancelButton: 'custom-swal-cancel'
                },
            }).then((result) => {
                if (result.isConfirmed) {
                    const pageName = result.value;

                    axios.post(`{{ route('activities.store') }}`, {
                            name: pageName
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
    </style> --}}
</body>

</html>
