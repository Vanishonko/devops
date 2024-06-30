<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.3/css/bulma.min.css">
</head>
<body>
<div class="container">
    <section class="section">
        <div class="container">
            <h1 class="title has-text-centered">Register</h1>
            <form action="/register" method="post" class="box">
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
                        <input class="input" type="password" name="password" placeholder="Password" id="password" required minlength="8">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Confirm Password</label>
                    <div class="control">
                        <input class="input" type="password" name="password_confirmation" placeholder="Confirm Password" id="password_confirmation" required minlength="8" oninput="check(this)">
                    </div>
                </div>
                <div class="field">
                    <label class="checkbox">
                        <input type="checkbox" name="remember" id="remember"> Remember me
                    </label>
                </div>
                <div class="field">
                    <div class="control">
                        <button class="button is-link">Register</button>
                    </div>
                </div>
            </form>
            <button class="button is-link" onclick="window.history.back()">Back</button>
            <button class="button is-link" onclick="window.location.href='/login'">Log in</button>
            <script language='javascript' type='text/javascript'>
                function check(input) {
                    if (input.value != document.getElementById('password').value) {
                        input.setCustomValidity('Password Must be Matching.');
                    } else {
                        // input is valid -- reset the error message
                        input.setCustomValidity('');
                    }
                }
            </script>
        </div>
    </section>
</div>
</body>
</html>
