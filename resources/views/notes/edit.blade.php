<!DOCTYPE html>
<html>
<head>
    <title>Edit Note</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title">Edit Note</h1>
        <form method="POST" action="{{ route('notes.update', $note) }}">
            @csrf
            @method('PUT')
            <div class="field">
                <label class="label" for="content">Content:</label>
                <div class="control">
                    <textarea class="textarea" id="content" name="content">{{ $note->content }}</textarea>
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</section>
</body>
</html>
