<html>

<head>
  <link href="style.css" rel="stylesheet">
</head>

<body>

  <center>
    <div id="divform">

      <form method="POST">
        <center>

          <div class=input>
            <label class="label">Email:</label>
            <input type="email" name="email">
          </div>

          <br><br>

          <div class=input>
            <label class="label">Senha:</label>
            <input type="password" name="senha">
          </div>

          <br><br> <br><br>

          <input type="submit" id="submit" value="login">

          <br><br> <br><br>

          <a href="index.php">cadastro</a>

        </center>
    </div>
  </center>
  </form>
</body>

</html>

<?php
session_start();

if($_SESSION['logado']) {
  header("Location: dashboard.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $email = $_POST["email"];
  $senha = $_POST["senha"];

  include './config/database.php';

  $query = "SELECT (senha) FROM `usuarios` WHERE email = '" . $email . "'";

  if ($result = $msqli->query($query)) {
    $usuario = $result->fetch_all()[0];

    if ($usuario[0] == $senha) {
      $_SESSION['logado'] = true;
      $_SESSION['email'] = $email;

      header("Location: dashboard.php");
    } else {
      echo "🤬";
    }
  } else {
    echo "Problemas com o login";
  }
}
?>