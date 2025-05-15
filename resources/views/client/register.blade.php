<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(175deg, #C7C5F4, #776BCC);
        }

        .register-container {
            background-color: rgba(200,200,200,0.13);
            /*border-radius: 8px;*/
            /*box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);*/
            overflow: hidden;
            width: 300px;
            /*padding: 35px;*/
            transition: transform 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(10px);
            border-radius: 10px;
            border: 2px solid rgba(255,255,255,0.1);
            box-shadow: 0 0 40px rgba(8,7,16,0.6);
            padding: 50px 35px;
        }

        .register-container:hover {
            transform: translateY(-5px);
        }



        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input {
            border: none;
            border-bottom: 2px solid #D1D1D4;
            background: none;
            padding: 10px;
            padding-left: 24px;
            font-weight: 700;
            width: 75%;
            transition: .2s;;
        }
        .form-group input:active,
        .form-group input:focus,
        .form-group input:hover {
            outline: none;
            border-bottom-color: #6A679E;
        }

        .form-group button {
            margin-top: 10px;
            width: 280px;
            height: 55px;
            background-color: #ffffff;
            color: #080710;
            padding: 15px 0;
            font-size: 18px;
            font-weight: 600;
            border-radius: 10px;

            cursor: pointer;
        }

        img {
            width: 20px;
            margin-left: 10px;
            margin-top: 20px;
            cursor: pointer;
        }

        .form-group button:hover {
            background-color: aquamarine;
        }

        @import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

    </style>
</head>
<body>
<div class="register-container">
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" placeholder="Email" required>
        </div>

        <div class="form-group">
            <label for="">Phone</label>
            <input type="text" maxlength="10" name="phone" id="numericInput" placeholder="Phone" pattern="\d*" title="Only enter numbers" required>
        </div>

        <div class="form-group">
            <label for="">FullName</label>
            <input type="text" name="fullName" placeholder="Full Name" required>
        </div>

        <div class="form-group">
            <label for="">Password</label>
            <input type="password" name="password" placeholder="Password (Min 3 characters)" id="password" required onkeyup='check();'>

            <img src="image/eye-closed.png" id="eyeicon">
        </div>
        <div class="form-group">
            <label for="">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm Password (Min 3 characters)" id="password_confirmation" required onkeyup='check();'>

            <span id='message'></span>
        </div>
        @if ($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
        <div class="form-group">
            <button type="submit" disabled>Register</button>
        </div>
        <div class="form-group">
            You have an account?
            <a href="/login">Login Here</a>
        </div>
    </form>
</div>


<script>
    let eyeicon = document.getElementById("eyeicon");
    let password = document.getElementById("password");
    let password_confirmation = document.getElementById("password_confirmation");

    eyeicon.onclick = function (){
        if (password.type == "password" || password_confirmation.type == "password"){
            password.type = "text";
            password_confirmation.type = "text";
        }else {
            password.type = "password";
            password_confirmation.type = "password";
        }
    }

    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('password_confirmation').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'Password matches';
            document.querySelector("button[type='submit']").disabled = false;
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'Password do not match';
            document.querySelector("button[type='submit']").disabled = true;
        }
    }

    document.getElementById('numericInput').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>


</body>
</html>
