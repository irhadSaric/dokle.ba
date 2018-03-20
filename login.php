
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="images/miniLogo.png">
        <title>Login</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <link href="login.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container">
            <div class="jumbotron">
                <a href="index.html"><img src="dokleIcon.png"></a>
                <form method="post" action="login-logic.php">
                    <p id="greskaLoginEmail" style="color: green"><?php if(isset($_GET['poruka'])) {echo $_GET['poruka'];}?></p>
                    <p id="greskaLoginPass"></p>
                    <div class="form-group">
                        <input type="email" class="form-control" name="emailLogin" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="passLogin" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="login" value="Loguj se">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>