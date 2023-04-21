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
            <label class="label">Nome:</label>
            <input type="text" name="nome">
          </div>

          <br><br>

          <div class=input>
            <label class="label">Sobrenome:</label>
            <input type="text" name="sobrenome">
          </div>

          <br><br>

          <div class=input>
            <label class="label">Endereço:</label>
            <input type="text" name="endereco">
          </div>

          <br><br>

          <div class=input>
            <label class="label">Data de nascimento:</label>
            <input type="date" name="data">
          </div>

          <br><br>

          <div class=input>
            <label class="label">Email:</label>
            <input type="email" name="email">
          </div>

          <br><br>

          <div class=input>
            <label class="label">Senha:</label>
            <input type="password" name="senha">
          </div>

          <br><br>

          <div class=input>
            <label class="label">Telefone:</label>
            <input type="number" name="telefone">
          </div>

          <br><br> <br><br>

          <input type="submit" id="submit" value="cadastrar">

          <br><br> <br><br>

          <a href="login.php">login</a>

          <br><br>
        </center>


    </div>
  </center>
  </form>
</body>

</html>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $nome = $_POST["nome"];
  $sobrenome = $_POST["sobrenome"];
  $endereco = $_POST["endereco"];
  $data = $_POST["data"];
  $email = $_POST["email"];
  $telefone = $_POST["telefone"];
  $senha = $_POST["senha"];

  include './config/database.php';

  $query = "INSERT INTO `usuarios` (nome, sobrenome, endereco, data, email, telefone, senha) VALUES ('" . $nome . "','" . $sobrenome . "','" . $endereco . "','" . $data . "', '" . $email . "','" . $telefone . "','" . $senha . "');";

  if ($result = $msqli->query($query)) {
    header("Location: login.php");
  }

  $msqli->close();
}
?>