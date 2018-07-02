<?php
$idw = strstr($id, ':', true);
if ($idw == 'https' OR 'http')
{
	if ($idw == 'https')
	{
		$id = str_replace('https://vk.com/', "", $id);
	}
	if ($idw == 'http')
	{
		$id = str_replace('http://vk.com/', "", $id);
	}
}
$idw = strstr($id, '/', true);
if ($idw == 'vk.com')
{
	$id = str_replace('vk.com/', "", $id);
}
$request_params = array(
'user_ids' => $id,
'access_token' => $token,
'v' => '5.73'
);

$get_params = http_build_query($request_params);
$result = json_decode(file_get_contents('https://api.vk.com/method/users.get?'. $get_params));
$id = ($result -> response[0] -> id);
/*if ($id == '0')
{
    $request_params = array( 
'message' => "Доступ запрещён", 
'user_id' => $user_id, 
'access_token' => $token,
'read_state' => 1,
'v' => '5.0' 
); 

$get_params = http_build_query($request_params); 

file_get_contents('https://api.vk.com/method/messages.send?'. $get_params); 

//Возвращаем "ok" серверу Callback API 
echo('ok'); 

break;
}*/