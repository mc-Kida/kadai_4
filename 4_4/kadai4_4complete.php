<?php
//データ取得（郵便番号）
	$data =$_POST['input3'];
	var_dump($data);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>アドレス登録</title>
</head>
<body>
<?php
//検索によるデータ削除
require_once 'db4_4.php';
$search = mysql_query("SELECT * FROM kadai_kida_ziplist WHERE zip_code = $data");
$row = mysql_fetch_array($search);

$delete = 

$result = mysql_query('SET NAMES utf8', $link);
if (!$result) {
  die('文字コードを指定できませんでした。');
}
//更新手続き  var_dump($_POST);

$public_group_code =  $_POST['input1'];
$zip_code_old=  $_POST['input2'];
$zip_code =  $_POST['input3'];
$prefecture_kana =  $_POST['input4'];
$city_kana =  $_POST['input5'];
$town_kana =  $_POST['input6'];
$prefecture =  $_POST['input7'];
$city =  $_POST['input8'];
$town =  $_POST['input9'];
$town_double_zip_code =  $_POST['input10'];
$town_multi_address =  $_POST['input11'];
$town_attach_district =  $_POST['input12'];
$zip_code_multi_town =  $_POST['input13'];
$update_check =  $_POST['input14'];
$update_reason =  $_POST['input15'];

var_dump($_POST);



$sql = "UPDATE  `kadai_kida_ziplist` SET
`public_group_code` =  '$public_group_code',
`zip_code_old` =  '$zip_code_old',
`zip_code` =  '$zip_code',
`prefecture_kana` =  '$prefecture_kana',
`city_kana` =  '$city_kana',
`town_kana` =  '$town_kana',
`prefecture` =  '$prefecture',
`city` =  '$city',
`town` =  '$town',
`town_double_zip_code` =  '$town_double_zip_code',
`town_multi_address` =  '$town_multi_address',
`town_attach_district` =  '$update_check',
`zip_code_multi_town` =  '$zip_code_multi_town',
`update_check` =  '$update_check',
`update_reason` = '$update_reason' WHERE  `zip_code` =  '$zip_code'";

	if(!$res=mysql_query($sql))
	{
	echo "SQL実行時エラー";
	exit;
	}




//$result = mysql_query("INSERT INTO kadai_kida_ziplist (public_group_code,zip_code_old,zip_code,prefecture_kana,city_kana,town_kana,prefecture,city,town,town_double_zip_code,town_multi_address,town_attach_district,zip_code_multi_town,update_check,update_reason) VALUES ($public_group_code,$zip_code_old,$zip_code,$prefecture_kana,$city_kana,$town_kana,$prefecture,$city,$town,$town_double_zip_code,$town_multi_address,$town_attach_district,$zip_code_multi_town,$update_check,$update_reason)",$link);
$result = mysql_query("INSERT INTO `kadai_kida_ziplist`
		(
		`public_group_code`,
		`zip_code_old`,
		`zip_code`,
		`prefecture_kana`,
		`city_kana`,
		`town_kana`,
		`prefecture`,
		`city`,
		`town`,
		`town_double_zip_code`,
		`town_multi_address`,
		`town_attach_district`,
		`zip_code_multi_town`,
		`update_check`,
		`update_reason`
		)
		VALUES
		(
		'$public_group_code',
		'$zip_code_old',
		'$zip_code',
		'$prefecture_kana',
		'$city_kana',
		'$town_kana',
		'$prefecture',
		'$city',
		'$town',
		'$town_double_zip_code',
		'$town_multi_address',
		'$town_attach_district',
		'$zip_code_multi_town',
		'$update_check',
		'$update_reason'
		)"
);

/*if (!$result) {
  exit('データを変更できませんでした。');
}*/

$link = mysql_close($link);
if (!$link) {
  exit('データベースとの接続を閉じられませんでした。');
}

?>
<p>1行削除完了しました！<br /><a href="kadai4_3list.php">戻る</a></p>
</body>
</html>