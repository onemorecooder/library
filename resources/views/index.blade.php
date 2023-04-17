<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body style="margin: 20px">
    <h1 style="font-weight: bold">StuEvento? o es el mío? ( ͡° ͜ʖ ͡°) ajjaajajajaja</h1>
    <a href="{{ route('create') }}" class="btn btn-primary">Agregar evento</a>
    <a href="{{ route('index') }}" class="btn btn-secondary">Mostrar todos los eventos</a>

    <form action="{{ route('logout') }}" method="GET">
        @csrf
        <button type="submit">Logout</button>
    </form>


    <table style="text-align: center" class="table">
        <thead>
            <tr>
                <th style="text-align: center" scope="col">Title</th>
                <th style="text-align: center" scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>
                        <a href="{{ route('edit', $event->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <a href="{{ route('show', $event->id) }}" class="btn btn-sm btn-success">Show</a>
                        <form action="{{ route('destroy', $event->id) }}" method="POST" style="display: inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure you want to delete this event?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $events->links() }}
</body>

</html>
