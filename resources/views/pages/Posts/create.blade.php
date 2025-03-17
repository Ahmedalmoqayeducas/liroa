<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إضافة منشور</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container p-4">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h1>كتابة منشورات داخل الصفحات الرئيسية</h1>
                </div>
                <a href="{{ route('activities.index') }}" class="btn btn-lg btn-danger">الرجوع لعرض المنشورات</a>
                <form action="{{ route('activities.index') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="title">العنوان:</label>
                        <input type="text" class="form-control" name="title" id="title"
                            value="{{ old('title') }}">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">الصورة:</label>
                        <input type="file" class="form-control-file border rounded p-3 text-center" name="thumbnail"
                            id="thumbnail">
                    </div>
                    <div class="form-group">
                        <label for="card_description">الوصف المختصر:</label>
                        <textarea class="form-control" name="card_description" id="card_description" value="{{ old('card_description') }}"
                            rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="type">نوع المنشور:</label>
                        <select class="form-control" name="type" id="type" value={{ old('type') }}>
                            <option value="news">أخبار</option>
                            <option value="insights">رؤى</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">بنية المنشور:</label>
                        <textarea name="description" id="description" cols="35" rows="15" value="{{ old('description') }}"></textarea>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary">حفظ</button>
                </form>
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
    <script>
        document.getElementById('thumbnail').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const imagePreview = document.getElementById('imagePreview');
            const placeholderText = document.getElementById('placeholderText');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    placeholderText.style.display = 'none';
                }

                reader.readAsDataURL(file);
            } else {
                imagePreview.src = '#';
                imagePreview.style.display = 'none';
                placeholderText.style.display = 'block';
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
