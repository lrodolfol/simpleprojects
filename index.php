<html>
<form action="index.php" method="POST">
<input type="text" id="cpf" name="cpf">
<button name="submit">Verificar</button>
</form>
</html>
<?php
if(isset($_POST['submit'])) {
include_once 'Funcoes.php';
$funcao = new Funcoes;

$cpf = $_POST['cpf'];
if($funcao->validaCpf($cpf)){
	?><p style="color:blue"><?php echo $funcao->msg; ?></p><?php
}else{
	?><p style="color:red"><?php echo $funcao->msg; ?></p><?php
}


}
?>