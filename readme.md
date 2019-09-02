## Simple CURL Wrapper

```
include_once('Curlme.php')   

$Curlme = new Curlme;
$Curlme->setBase('https://reqres.in');
$Curlme->SetBase('http://localhost/local/php/fatfree');
```

#### Add Params

```
$params = [ 
			'name'=>'neo',
			'job'=>'the two',
		   ];


print($Curlme->post('/post/create',$params));