<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="div">
        @foreach($detalle as $detalle)
        <a class="btn btn-sm btn-info" href="/uploads/{{ $detalle->history }}" target="blank_"><i class="material-icons">visibility</i></a>
        @endforeach
    </div>
</body>
</html>