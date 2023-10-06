<?php
	//iniciando a ação=>
	session_start();

	//verificando se o form foi enviado =>
	//o 'act' é o name do input que envia o form
	if (isset($_POST['act'])) {
    $tarefa = strip_tags($_POST['task']);
    
    if (!isset($_SESSION['tarefas'])) {
        $_SESSION['tarefas'] = array();
    }
    
    // Verifica se a tarefa já existe na matriz antes de adicioná-la novamente
    if (!in_array($tarefa, $_SESSION['tarefas'])) {
        $_SESSION['tarefas'][] = $tarefa;
    }
    
    echo "<script>alert('Consulta de lembrete: OK')</script>";
}
	if (isset($_POST['limpa'])) {
    	$_SESSION['tarefas']=array();
    }
	
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>To Do</title>
</head>
<style type="text/css">
	*{box-sizing: border-box;padding: 0;margin: 0;font-family:cursive;}
	body{display: flex;align-items: center;justify-content: center;flex-direction: column;
		width: 100vw;height: 100vh;background: #3b3b3b}
	form{display: flex;flex-direction: column;gap: 15px;align-items: center;width: 50vw;height: 50vh;justify-content: center;}
	input:nth-child(even){background: transparent;border: none;height: 45.5px;outline: none;padding-left: 5px;color: floralwhite;overflow: auto;}
	#btn{width: 25px;height: 25px;cursor: pointer;outline: none;border: none;color: green;font-size: 16px;background: transparent;transition: 0.45s;}
	#btn:hover{scale: 1.75}
	#btnLimpa{width: 10vw;}
</style>

<body>
	<form action="" method="POST">
		<h1 style="color: #374ACA;text-shadow: 0 0 10px bisque;position:relative;top: 0%;">Lista de Tarefas</h1>

		<fieldset><legend style="color:white;padding-inline: 7.5px;">Insira a tarefa</legend>
			<input type="text" name="task"><input id="btn" name="act" type="submit" value="+"></fieldset>

			<input type="submit" name="limpa" id="btnLimpa" value="Limpar tarefas">
		
		
	</form>
	<?php
		 if (isset($_SESSION['tarefas'])) {
        echo "<div>";
        foreach ($_SESSION['tarefas'] as $tarefa) {
            echo $tarefa . "<br>";
        }
        echo "</div>";
    }
	?>
</body>
</html>
