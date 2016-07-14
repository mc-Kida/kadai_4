<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>アドレス登録</title>
</head>
<body>
<?php

$link = mysql_connect('localhost', 'root', '');
if (!$link) {
  die("接続できませんでした。");
}

$result = mysql_select_db("lesson", $link);
if (!$result) {
  die('データベース選択できませんでした。');
}

$result = mysql_query('SET NAMES utf8', $link);
if (!$result) {
  die('文字コードを指定できませんでした。');
}
var_dump($_POST);
$public_group_code   = $_POST['input1'];
$zip_code_old = $_POST['input2'];
$zip_code  = $_POST['input3'];
$prefecture_kana  = $_POST['input4'];
$city_kana  = $_POST['input5'];
$town_kana  = $_POST['input6'];
$prefecture  = $_POST['input7'];
$city  = $_POST['input8'];
$town  = $_POST['input9'];
$town_double_zip_code  = $_POST['input10'];
$town_multi_address  = $_POST['input11'];
$town_attach_district  = $_POST['input12'];
$zip_code_multi_town  = $_POST['input13'];
$update_check  = $_POST['input14'];
$update_reason  = $_POST['input15'];


//$result = mysql_query("INSERT INTO kadai_kida_ziplist (public_group_code,zip_code_old,zip_code,prefecture_kana,city_kana,town_kana,prefecture,city,town,town_double_zip_code,town_multi_address,town_attach_district,zip_code_multi_town,update_check,update_reason) VALUES ($public_group_code,$zip_code_old,$zip_code,$prefecture_kana,$city_kana,$town_kana,$prefecture,$city,$town,$town_double_zip_code,$town_multi_address,$town_attach_district,$zip_code_multi_town,$update_check,$update_reason)",$link);
$result = mysql_query("INSERT INTO `kadai_kida_ziplist`(
		`public_group_code`, `zip_code_old`, `zip_code`,
		`prefecture_kana`, `city_kana`, `town_kana`,
		`prefecture`, `city`, `town`,
		`town_double_zip_code`, `town_multi_address`, `town_attach_district`,
		`zip_code_multi_town`, `update_check`, `update_reason`)
		VALUES (
		'$public_group_code','$zip_code_old','$zip_code',
		'$prefecture_kana','$city_kana','$town_kana',
		'$prefecture','$city','$town',
		'$town_double_zip_code','$town_multi_address','$town_attach_district',
		'$zip_code_multi_town','$update_check','$update_reason')"
);

/*if (!$result) {
  exit('データを登録できませんでした。');
}*/

$link = mysql_close($link);
if (!$link) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
<p>1行登録完了しました！<br /><a href="kadai4_1list.php">戻る</a></p>
</body>
</html>