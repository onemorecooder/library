<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Show</title>
</head>
<body style="margin: 70px">
    <div class="card">
        <div class="card-body">
          <h1 class="card-title">{{ $event->title }}</h1>
          <h6 class="card-subtitle mb-2 text-muted">Created by: {{ $event->user->name }}</h6>
          <h2>Descripción: </h2>
          <p>{{ $event->description }}</p>
            <h2>Asistentes</h2>
          <div>
            @foreach ($event->attendeesUsers as $attendee)
            
                <p>· <b>{{ $attendee->name }}</b> - {{ $attendee->email }}</p><br>

            @endforeach
            </div>
          <p class="card-text"><b>Fecha del evento:</b> {{ $event->date }}</p>
          <p class="card-text"><strong>Location:</strong> {{ $event->location }}</p>
          <a href="{{ route('index') }}" class="btn btn-primary">Go Back</a>
        </div>
      </div>
</body>
</html>