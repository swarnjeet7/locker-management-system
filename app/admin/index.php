<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to PIGGI Bank</title>
    <link rel="shortcut icon" href="/app/assets/img/favicon.ico" />
    <link rel="stylesheet" href="/app/assets/css/bootstrap.css" />
    <link rel="stylesheet" href="/app/assets/css/main.css" />
</head>
<body class="home-body">
    <form class="form-signin custom-form" onsubmit="return false;">
        <h1>Welcome to Admin Panel for PIGGI Bank</h1>
        <div class="input-group">
            <label for="inputId" class="sr-only">Admin Id</label>
            <input id="inputId" type="text" class="form-control" placeholder="Username" required autofocus>
        </div>
        <div class="input-group">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        </div>
        <div class="input-group">
            <button id="adminLogin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        </div>
    </form>

    <script src="/app/assets/js/jquery-3.4.0.js"></script>
    <script src="/app/assets/js/bootstrap.min.js"></script>
    <script src="/app/assets/js/script.js"></script>
</body>
</html>