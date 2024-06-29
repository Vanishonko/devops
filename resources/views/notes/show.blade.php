<!DOCTYPE html>
<html>
<head>
    <title>Note Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">Note Details</h1>
        <div class="box">
            <p>{{ $note->content }}</p>
            <a href="{{ route('notes.edit', $note) }}" class="button is-warning">Edit</a>
            <form method="POST" action="{{ route('notes.destroy', $note) }}" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="button is-danger">Delete</button>
            </form>
        </div>
        </div>
    </div>
</section>
</body>
</html>
