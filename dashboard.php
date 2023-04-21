<body>
    <?php
    session_start();

    $email = $_SESSION['email'];
    $logado = $_SESSION['logado'];

    include './config/database.php';

    $query = "SELECT * FROM `usuarios` WHERE email = '" . $email . "'";

    $result = $msqli->query($query);

    $msqli->close();

    if ($result) {
        $usuario = $result->fetch_all(MYSQLI_ASSOC)[0];

        $nome = $usuario['nome'];
        $sobrenome = $usuario['sobrenome'];
        $endereco = $usuario['endereco'];
        $data = $usuario['data'];
        $telefone = $usuario['telefone'];
    } ?>

    <h1>Dashboard</h1>

    <h2>Informações</h2>
    <ul>
        <?php
        echo "<li>Email: " . $email . "</li>";
        echo "<li>Nome: " . $nome . "</li>";
        echo "<li>Sobrenome: " . $sobrenome . " </li>";
        echo "<li>Data: " . $data . "</li>";
        echo "<li>Telefone: " . $telefone . "</li>";
        echo "<li>Logado: " .  $logado . "</li>";
        ?>
    </ul>

    <h2>Opções:</h2>
    <ul>
        <li><a href="deslogar.php">Deslogar</a></li>
        <li><a href="deletar_conta.php">Deletar minha conta</a></li>
    </ul>
</body>