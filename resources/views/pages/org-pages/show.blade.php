<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Preview</title>
    <!-- Bootstrap 3.4 CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container" style="margin-top: 30px;">
        <div class="row">
            <div class="col-md-12">
                <!-- Header Section -->
                <div class="text-center" style="margin-bottom: 20px;">
                    <h1 class="text-primary">
                        رؤية واضحة للصفحة <br>
                        (Preview How the Page Will Appear)
                    </h1>
                    <hr>
                </div>

                <!-- Back to Pages button -->
                <div class="text-right" style="margin-bottom: 20px;">
                    <a href="{{ route('pages.index') }}" class="btn btn-danger btn-lg">
                        الرجوع لعرض الصفحات
                    </a>
                </div>

                <!-- Loop through data and display each item -->
                @foreach ($data as $element)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title text-center" style="font-size: 1.5em;">
                                {{ $element->title }}
                            </h3>
                        </div>
                        <div class="panel-body">
                            <!-- Display HTML description safely -->
                            {!! $element->description !!}
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <!-- Bootstrap 3.4 JS (optional, if you need scripts) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>
