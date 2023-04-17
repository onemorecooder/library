<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Create</title>
</head>

<body style="margin: 70px">
    <h1>Añadir un evento</h1>
    <form action="{{ route('store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">title:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="description">Descripción:</label>
            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="location">location:</label>
            <textarea name="location" id="location" class="form-control"></textarea>
        </div>
        @foreach ($users as $user)
            <div class="form-check" style="display: inline-block">
                <input type="checkbox" name="users[]" value="{{ $user->id }}" class="form-check-input">
                <label style="margin-right: 30px" class="form-check-label"
                    for="{{ $user->id }}">{{ $user->name }}</label>
            </div><br>
        @endforeach
        <div class="form-group">
            <label for="date">Fecha:</label>
            <input type="date" name="date" id="date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Guardar libro</button>
        <a href="{{ route('index') }}" class="btn btn-primary">Go Back</a>
    </form>

</body>

</html>
