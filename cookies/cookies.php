<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = htmlspecialchars($_POST["nome"]);
    $nasc = $_POST["nasc"];
    $email = $_POST["email"];
    $nac = htmlspecialchars($_POST["nac"]);
    setcookie("nome", $nome, time() + (7 * 24 * 60 * 60), "/"); 
    setcookie("nasc", $nasc, time() + 7 * 24 * 60 * 60, "/");
    setcookie("email", $email, time() + 7 * 24 * 60 * 60, "/");
    setcookie("nac", $nac, time() + 7 * 24 * 60 * 60, "/");
    header("Location: " . $_SERVER["PHP_SELF"]);
    exit;
}

$nome = isset($_COOKIE["nome"]) ? $_COOKIE["nome"] : null;
$nasc = isset($_COOKIE["nasc"]) ? $_COOKIE["nasc"] : null;
$email = isset($_COOKIE["email"]) ? $_COOKIE["email"] : null;
$nac = isset($_COOKIE["nac"]) ? $_COOKIE["nac"] : null;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <title>Teste Cookie</title>
</head>
<body style="font-family: 'Roboto';">
    <?php if ($nome): ?>
        <h1>Dados de Login</h1>
        <p>Nome: <strong><?= $nome?></strong></p>
        <p>Email: <strong><?= $email?></strong></p>
        <p>Data de Nascimento: <strong><?= $nasc?></strong></p>
        <p>Nacionalidade: <strong><?= $nac?></strong></p>
        <p> <a style="color: rgba(0, 2500, 0);" href="?reset=true">Voltar</a></p>

        <?php
        if (isset($_GET["reset"])) {

            setcookie("nome", "", time() - 3600, "/");
            header("Location: " . $_SERVER["PHP_SELF"]);
            exit;
        }
        ?>
    <?php else: ?>
        <h1>Opa, digite seu nome</h1>
        <form method="POST" action="">
            <label for="nome">Digite seu nome</label>
            <input type="text" id="nome" name="nome" required/>
            <label for="nasc">Digite sua data de nascimento</label>
            <input type="date" required placeholder="Selecione o ano em que você nasceu" name="nasc" />
            <label for="email">Digite seu email</label>
            <input type="email" required placeholder="Digite seu email" name="email"  />
            <select name="nac" id="nac">
                <?= $response = file_get_contents("https://gist.githubusercontent.com/gmasson/0bdb72f767d305e2345c02d38e5e7eaf/raw/7799766df5a8b62ff2cee9e552361743198b5f8d/paises.html");
                ?>
            </select>
            
            <button type="submit">Enviar</button>
        </form>
    <?php endif; ?>
</body>
</html>
