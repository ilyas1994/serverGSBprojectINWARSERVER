<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>

<div class="container">
    <div class="row">

{{--        @dd($datass);--}}
                @isset($datass)


                @foreach($datass as $value)
{{--                    @dump($value)--}}
                <div class="col-12 text-center justify-content-center mt-4 mb-4">
{{--                <img style="max-height: 100%; max-width: 100%" src="{{ asset('storage/'.$value) }}" alt="">--}}
                <img style="max-height: 100%; max-width: 100%" src="{{ asset('storage/'.$value) }}" alt="">
                </div>
            @endforeach
            @endisset


    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
