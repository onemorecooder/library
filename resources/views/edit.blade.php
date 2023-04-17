<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Edit</title>
</head>

<body style="margin: 70px">
    <div class="container">
        <h1>Editar Evento</h1>
        <form method="POST" action="{{ route('update', $event) }}">
            @csrf
            @method('PUT')

            <div>
                <label for="title">Título:</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $event->title) }}">
            </div>

            <div>
                <label for="description">Descripción:</label>
                <textarea name="description" id="description" rows="5" class="form-control">{{ old('description', $event->description) }}</textarea>
            </div>

            <div>
                <label for="location">Ubicación:</label>
                <input name="location" id="location" class="form-control"
                    value="{{ old('location', $event->location) }}">
            </div>

            <div>
                <label for="date">Fecha:</label>
                <input type="date" name="date" id="date" class="form-control" required
                    value="{{ old('date', date('Y-m-d\TH:i:s', strtotime($event->date))) }}">
            </div>

            <div>
                <label>Participantes:</label>

                <div class="form-check form-check-inline">
                    @foreach ($users as $user)
                        @if ($event->attendeesUsers->contains($user->id))
                            <input class="form-check-input" type="checkbox" name="attendees[]"
                                value="{{ $user->id }}" checked>
                        @else
                            <input class="form-check-input" type="checkbox" name="attendees[]"
                                value="{{ $user->id }}">
                        @endif
                        <label class="form-check-label">{{ $user->name }}</label><br>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar cambios</button>
            <a href="{{ route('index') }}" class="btn btn-primary">Go Back</a>
        </form>



    </div>

</body>

</html>
