<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito';
        }
    </style>
    <script src="/js/app.js"></script>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Reservas
                </div>
                <div class="card-body" >
                    <div class="col">
                        <form action="{{ route('booking.list') }}" method="GET" role="search">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="search" aria-describedby="button-addon2" value="{{$search}}">
                                <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
                                <a class="btn btn-secondary"  href="{{ route('booking.export') }}" id="button-addon">Download</a>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-light ">
                            <thead>
                            <tr>
                                <th scope="col">Localizador</th>
                                <th scope="col">Huesped</th>
                                <th scope="col">Fecha de entrada</th>
                                <th scope="col">Fecha de salida</th>
                                <th scope="col">Hotel</th>
                                <th scope="col">HotelPrecio</th>
                                <th scope="col">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($bookings as $book)
                                <tr>
                                    <td>{{$book->locator_number}}</td>
                                    <td>{{$book->client}}</td>
                                    <td>{{$book->entry_date}}</td>
                                    <td>{{$book->departure_date}}</td>
                                    <td>{{$book->hotel}}</td>
                                    <td>{{$book->price}}</td>
                                    <td>{{$book->actions}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
