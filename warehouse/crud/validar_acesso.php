<?php

session_start();

require_once('bd.php');

$login = $_POST['login'];
$senha = md5($_POST['senha']);
$_SESSION["dbgrid"] = array();
$_SESSION["dbgriddados"] = array();
$_SESSION["valortotal"] = 0;
$_SESSION["iterador"] = 1;
$_SESSION["vendaConcluida"] = 0;
$sql = "SELECT * FROM funcionario WHERE login = '$login' AND senha = '$senha'";

$resultado = $conexao->query($sql);

if($resultado){
	$dados = mysqli_fetch_array($resultado);

	if (isset($dados['login'])) {
		$_SESSION['login'] = $dados['login'];
		$_SESSION['administrador'] = $dados['administrador'];
		$_SESSION['id_funcionario'] = $dados['id_funcionario'];
		if($dados['administrador'] != 1){
			echo "func";
		}else{
			echo "adm";
		}

	}else{
		echo "errologin";
	}

}else{
	echo 'Erro na execução da consulta';
}

?>