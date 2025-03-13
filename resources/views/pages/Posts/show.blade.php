<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Summernote Text Editor CRUD and Image Upload in Laravel</title>
    <!-- bootstrap -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <div class="container p-4 ">

        <div class="row justify-content-md-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h1 class="">رؤية واضحة للمنشور في الصفحة كيف سيظهر </h1>
                    <hr>
                </div>
                <a href="{{ route('posts.index') }}" class="btn btn-lg btn-danger">
                    الرجوع لعرض المنشورات
                </a>
                <h3 class="text-center">{{ $data->title }}</h3>

                <div>
                    {!! $data->description !!}
                </div>


            </div>
        </div>
    </div>

</body>

</html>
