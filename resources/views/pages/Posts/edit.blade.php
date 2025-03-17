<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تعديل محتوى المنشور</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</head>

<body>
    <div class="container p-4">
        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 class="">تعديل محتوى المنشور</h1>
                </div>
                <a href="{{ route('activities.index') }}" class="btn btn-lg btn-danger">الرجوع لعرض المنشورات</a>
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
                <form action="{{ route('activities.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="title">العنوان:</label>
                        <input type="text" class="form-control" name="title" value="{{ $data->title }}">
                    </div>
                    <div class="form-group">
                        <label for="card_description">الوصف المختصر:</label>
                        <textarea name="card_description" class="form-control" rows="3">{{ $data->card_description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">الصورة:</label>
                        <input type="file" class="form-control-file" name="thumbnail">
                        @if ($data->thumbnail)
                            <img src="{{ Storage::url($data->thumbnail) }}" alt="Thumbnail" style="max-width: 150px;">
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="type">نوع المنشور:</label>
                        <select class="form-control" name="type" id="type">
                            <option value="news">أخبار</option>
                            <option value="insights">رؤى</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">الوصف:</label>
                        <textarea name="description" id="description" cols="50" rows="20">{{ $data->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-lg btn-primary">حفظ</button>
                    <a href="{{ route('activities.index') }}" class="btn btn-lg btn-secondary">إلغاء</a>
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
</body>

</html>
