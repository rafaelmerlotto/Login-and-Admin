<?php
include("config.php");
session_start();

if (isset($_POST['submit'])) {

    $nome = $_POST['nome'];
    $password = $_POST['password'];

    $nome = mysqli_real_escape_string($connessione, $nome);
    $password = mysqli_real_escape_string($connessione, $password);

    $query = "SELECT * FROM utente WHERE nome = '{$nome}' AND password ='{$password}'";

    $trovaUtente = mysqli_query($connessione, $query);

    if (!$trovaUtente) {
        die("richiesta fallita" . mysqli_error($connessione));
    }else{
        echo "Ciao $nome";
    }

while($row =mysqli_fetch_array($trovaUtente)){
        $utente = $row['nome'];
        $passUtente = $row['password'];
}
if($nome === $utente && $password === $passUtente){

    $_SESSION['nome'] = $utente;
    $_SESSION['password'] = $passUtente;
    $_SESSION['username'] = $nome;
       
   
    header('Location: guestbook.php');
} else{
    echo "<p class='btn btn-danger'> Nome o password errate </p>";;
}


}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <h2 class="bg-success">Login</h2>
        <div class="col-sm-6">
            <form action="" method="POST">
                <div class="form-group">
                    <label for="nome">Nome utente</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <input type="submit" name="submit" value="Login" class="btn btn-success">
            </form>
            <hr>
           <a href="registrazione.php">Registrati</a>
        </div>



</body>

</html>