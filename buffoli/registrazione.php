<!DOCTYPE html>
<html>
    <head>
        <script>
            function Invia()
            {
                if(document.getElementById("email").value=="" || document.getElementById("password").value=="")
                {
                    if(document.getElementById("password").value=="")
                    {
                        document.getElementById("password").style.background = "yellow";
                        document.getElementById("password").focus();
                    }
                    if(document.getElementById("email").value=="")
                    {
                        document.getElementById("email").style.background ="yellow";
                        document.getElementById("email").focus();
                    }
                }
                else
                    document.getElementById("form").submit();
                }
        </script>
    </head>
    <body>
        <?php
            include_once 'config.php';
            if(isset($_POST['email']))
            {
                echo("echo");
                $email = $_POST['email'];
                $password = /*md5(*/$_POST['password']/*)*/;
                $data = $_POST['date'];
                $controllo = $connectDB->query("insert into users(email,password, birthday) values ('$email','$password','$data');");
            
                if($controllo === true)
                {
                    echo("Registrazione eseguita con successo");
                    
                    setcookie("email", $email);

                    echo('<script>function index(){location.href="index.php"}</script>');
                    echo('<script>index()</script>');
                }
                else
                {
                    echo '<script>alert("EMAIL GIA INSERITA")';
                    header("login.php");
                }
            }
            else
            {
                echo ('<form method="post" action="' . $_SERVER["PHP_SELF"] . '" id="form">
                <span>Inserisci email:</span><input type="text" id="email" name="email"></input>
                <span>Inserisci password:</span><input type="password" id="password" name="password"></input>
                <span>Inserisci la data di nascita:</span><input type="date" id="date" name="date"></input>
                </form><button onclick="Invia()">Invia</button>');
            }
        ?>
    </body>
</html>