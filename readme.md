## Simple CURL Wrapper

```
include_once('Curlme.php')   

$Curlme = new Curlme;

#Sets a Base URL

$Curlme->setBase('https://reqres.in');
```

#### Add Params

```
$params = [ 
	'name'=>'neo',
	'job'=>'the two',
];

print($Curlme->post('/post/create',$params));