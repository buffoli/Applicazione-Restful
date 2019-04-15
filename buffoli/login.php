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

            function registrati()
            {
                location.href="registrazione.php";
            }
        </script>
    </head>
    <body>
        <?php
            include_once 'config.php';
            if(isset($_POST['email']))
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $data = $_POST['date'];
                $controllo = $connectDB->query("select * from users where email = '$email' and password = '$password'");
            
                if($controllo->num_rows > 0)
                {
                    echo('<script>alert("Registrazione eseguita con successo")</script>');
                    
                    setcookie("email", $email);

                    echo('<script>function index(){location.href="index.php"}</script>');
                    echo('<script>index()</script>');
                }
                else
                {
                    $controllo=$connectDB->query("select * from users where email = '$email'");
                    if($controllo->num_rows > 0)
                    {
                        echo '<script>alert("Password Errata")</script>';
                        unset($_POST['email']);
                        unset($_POST['password']);
                        echo('<script>function reload(){location.href="' . $_SERVER["PHP_SELF"] . '"}</script>');
                        echo('<script>reload()</script>');
                    }
                    else {
                        echo '<script>alert("Mail non presente nel database");</script>';
                        echo '<button onClick="registrati()">Registrati</button>';
                    }
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