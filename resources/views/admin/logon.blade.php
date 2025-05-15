<link rel="stylesheet" href="/admincss/logon.css">

<body class="body-container">
    <div class="container">
        <div class="heading">Sign In</div>

        <form action="/logon" class="form" method="POST">
            @csrf
            <input class="input" type="email" name="email" id="email" placeholder="E-mail" required>
            <input class="input" type="password" name="password" id="password" placeholder="Password" required>

            @if ($message = Session::get('error'))
                <strong style="color: red">{{ $message }}</strong>
            @endif
            <input class="login-button" type="submit" value="Sign In">
        </form>

    </div>

</body>

