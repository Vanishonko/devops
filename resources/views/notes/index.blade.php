<!DOCTYPE html>
<html>
<head>
    <title>Notes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">Notes</h1>
        <a href="{{ route('notes.create') }}" class="button is-primary">Create Note</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="button is-danger">Logout</button>
        </form>
        @foreach ($notes as $note)
            <div class="box">
                <p><a href="{{ route('notes.show', $note) }}">{{ $note->content }}</a></p>
                <a href="{{ route('notes.edit', $note) }}" class="button is-warning">Edit</a>
                <form method="POST" action="{{ route('notes.destroy', $note) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button is-danger">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
</section>
</body>
</html>
