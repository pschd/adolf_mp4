<?php
$token = 'token'; // 202cb962ac59075b964b07152d234b70
$id = ''; // https://vk.com/durov
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
// $id == '1'; // id
