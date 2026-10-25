<?php

    require_once "conexao.php";

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $descricao = trim($_POST["descricao"] ?? "");

        if($descricao !== "" && strlen($descricao) <= 100){
            $sql = "INSERT INTO tarefas (descricao) VALUES (?)";

            $stmt = $conexao->prepare($sql);
            $stmt->bind_param("s", $descricao);
            $stmt->execute();

            $stmt->close();
        }

        header("Location: tarefas.php");
        exit;
    }

$sql = "SELECT id, descricao FROM tarefas ORDER BY id DESC";
$resultado = $conexao->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
</head>
<body>
    <h1>Minhas tarefas</h1>


    <ul>
        <?php while ($tarefa = $resultado->fetch_assoc()): ?>
            <li>
                <?= 
                    htmlspecialchars($tarefa["descricao"],
                    ENT_QUOTES, "UTF-8")
                ?>
            </li>
        <?php endwhile; ?>
    </ul>

    <?php if($resultado->num_rows === 0): ?>
        <p>Nenhuma tarefa ainda</p>
    <?php endif; ?>
    <a href="index.html">Voltar</a>
</body>
</html>