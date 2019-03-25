<?php
class Funcoes {
	public $msg;
	
	public function validaCpf($cpf) {
		//SE O TAMANHO DO CPF FOR MENOR QUE 11 CARACTERES, JÁ RETORNA FALSO
		
		$cpf = preg_replace("/[^0-9]/", "", $cpf); //REMOVE TODAS AS LETRAS E CARACTERES ESPECIAIS QUE PODEM VIR NO PARAMENTRO(DEIXA APENAS NUMEROS)
		
		if(strlen($cpf) < 11 ) {				
			$this->msg = "CPF muito curto";
			return false;
		}
		
		$cpfArray = array(0,1,2,3,4,5,6,7,8,9,10); 
		
		//VERIFICA O PRIMEIRO DIGITO VERIFICADOR DO CPF
		for($x = 0; $x <= 10; $x++){
			$cpfArray[$x] = $cpf[$x];
		}
		
		$var = 0;
		$cont = 0;
		for($x = 10; $x >= 2; $x--){
			$var = $x * $cpfArray[$cont] + $var;
			$cont++;
		}
		
		if($var % 11 == 2) {
			$digitoUm = 0;
		}else{
			$digitoUm = 11 - ($var % 11);
		}
		
		if($digitoUm != $cpfArray[9]){
			$this->msg = "CPF inválido";
			return false;
		}
		
		//VERIFICA O SEGUNDO DIGITO VERIFICADOR DO CPF
		for($x = 0; $x <= 10; $x++){				
			$cpfArray[$x] = $cpf[$x];
		}
		
		$var = 0;
		$cont = 0;
		for($x = 11; $x >= 2; $x--){
			$var = $x * $cpfArray[$cont] + $var;
			$cont++;
		}
		
		if($var % 11 == 2) {
			$digitoDois = 0;
		}else{
			$digitoDois = 11 - ($var % 11);
		}
		if($digitoDois != $cpfArray[10]){
			$this->msg = "CPF inválido";
			return false;
		}
		
		
		//CASO ESTEJA TUDO CORRETO. RETORNA VEDADEIRO.
		$this->msg = "CPF válido";
		return true;
		
		
		
	}
	
}


?>