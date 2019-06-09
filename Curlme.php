<?php
/* An Easy Curl Class That creates standard pulls */

/* 

$Curlme = new Curlme;
$Curlme->setBase('https://reqres.in');
$Curlme->SetBase('http://localhost/local/php/fatfree');


$params = [ 'name'=>'neo',
			'job'=>'the two',
			];

print($Curlme->post('/post/create',$params));
*/ 

class Curlme {
	
	public $base; 
	
	function __construct() {
		$this->base = '';
	}
	
	function setBase($base) {
		$this->base = $base;
	}
	
	function get($url,$params = '') {
		return $this->operation($url,$params,'get');
	}

	function post($url,$params = '') {
		return $this->operation($url,$params,'post');
	}

	function put($url,$params = '') {
		return $this->operation($url,$params,'put');
	}	
	
	function operation($url,$params,$operation) {
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$this->base.$url);
		
		$this->setOperation($ch,$operation);
		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		if($params !=='') {
			$query = http_build_query($params);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$query );
		}
		$output = curl_exec ($ch);
		curl_close ($ch);
		return $output;		
	
	}
	
	function setOperation($ch,$operation) {
		
		switch ($operation) {
					
			case 'post':
				curl_setopt($ch, CURLOPT_POST,1);
				break;
			case 'put':
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
				break;
				
			case 'get':
			default:
				break;
		}
		
	}

	
}

?>
