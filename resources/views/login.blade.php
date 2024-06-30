<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
<div class="container">
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Log in</h1>
            <form action="/login" method="post" class="box">
                @csrf
                <div class="field">
                    <label class="label">Username</label>
                    <div class="control">
                        <input class="input" type="text" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="field">
                    <label class="label">Password</label>
                    <div class="control">
                        <input class="input" type="password" name="password" placeholder="Password" required minlength="8">
                    </div>
                </div>
                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" id="remember"> Remember me
                    </label>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-primary">Log in</button>
                    </div>
                </div>
            </form>
            <button class="button is-link" onclick="window.history.back()">Back</button>
            <button class="button is-link" onclick="window.location.href='/register'">Register</button>
        </div>
    </section>
</div>
</body>
</html>
