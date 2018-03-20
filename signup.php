<?php
    include("conn.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image/png" href="images/miniLogo.png">
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="signUp.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="coverImage">
            <div class="container">
                <div class="jumbotron">
                    <h1>Sign Up</h1>
                    <form class="form" method="post" action="signup-logic.php">
                        <p id="vanjskeGreske" style="color: red"><?php if(isset($_GET['poruka'])) {echo $_GET['poruka'];}?></p>
                        <p id="greskaIme" style="color: red"></p>
                        <p id="greskaPrezime" style="color: red"></p>
                        <p id="greskaMail" style="color: red"></p>
                        <p id="greskaPassword" style="color: red"></p>
                        <p id="greskaPassword2" style="color: red"></p>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control" name="Ime" placeholder="Ime">
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user"></i></div>
                            <input type="text" class="form-control" name="Prezime" placeholder="Prezime">
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                            <input type="email" class="form-control" name="email" placeholder="E-mail">
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                            <input type="password" class="form-control" name="pass" placeholder="Password">
                        </div>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-lock"></i></div>
                            <input type="password" class="form-control" name="pass2" placeholder="Potvrdi password">
                        </div>
                        <div class="form-group">
                            <!--<input type="submit" name="reg" value="Registruj me" class="dugme" action="register.php" id="registracijskoDugme"/>-->
                            <button type="submit" class="btn btn-primary" name="reg" value="Registruj me">Sign Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </body>
</html>