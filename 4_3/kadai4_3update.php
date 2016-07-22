<?php
//データ取得（郵便番号）
	$data =$_GET['data'];
	//var_dump($data);
?>

<!DOCTYPE html>
<html>
<head>
<title>更新フォーム画面</title>
<meta charset="utf-8">
</head>
<body>
<h1>変更・更新画面</h1>

<?php

//検索によるデータ牽引 -->
require_once 'db4_3.php';
$search = mysql_query("SELECT * FROM kadai_kida_ziplist WHERE zip_code = $data");
$row = mysql_fetch_array($search)

?>

<!-- 編集項目入力欄群（初期値が入力欄に既入） -->
<form action="kadai4_3check.php" method="post">
	全国地方公共団体コード   ：<input required type="text" name="public_group_code" value="<?php echo $row['public_group_code'] ?>" maxlength='5'  pattern="^[0-9]+$"><br>

	旧郵便番号               ：<input required type="text" name="zip_code_old" value="<?php echo $row['zip_code_old'] ?>" maxlength='3'  pattern="^[0-9]+$"><br>

	郵便番号                 ：<input required type="text" name="zip_code" value="<?php echo $row['zip_code'] ?>" maxlength='7'  pattern="^[0-9]+$" readonly="readonly"><br>

	都道府県名(半角カタカナ) ：<input required type="text" name="prefecture_kana" value="<?php echo $row['prefecture_kana'] ?>"><br>

	市区町村名(半角カタカナ) ：<input required type="text" name="city_kana" value="<?php echo $row['city_kana'] ?>"><br>

	町域名(半角カタカナ)     ：<input required type="text" name="town_kana" value="<?php echo $row['town_kana'] ?>"><br>

	都道府県名(漢字)         ：<input required type="text" name="prefecture" value="<?php echo $row['prefecture'] ?>"><br>

	市区町村名(漢字)         ：<input required type="text" name="city" value="<?php echo $row['city'] ?>"><br>

	町域名(漢字)             ：<input required type="text" name="town" value="<?php echo $row['town'] ?>"><br>

	<H5>一町域で複数の郵便番号か</H5>
	<SELECT required name="town_double_zip_code">

	switch($row['town_double_zip_code'])
		case 1:
			<OPTION value="">-</OPTION>
			<OPTION value="1" selected>該当せず</OPTION>
			<OPTION value="2">該当</OPTION>
			break;
		case 2:
			<OPTION value="">-</OPTION>
			<OPTION value="1">該当せず</OPTION>
			<OPTION value="2" selected>該当</OPTION>
			break;
	</SELECT>

	<H5>小字毎に番地が起番されている町域か</H5>
	<SELECT required name="town_multi_address">
	switch($row['town_multi_address'])
		case 1:
			<OPTION value="">-</OPTION>
			<OPTION value="1" selected>該当せず</OPTION>
			<OPTION value="2">該当</OPTION>
			break;
		case 2:
			<OPTION value="">-</OPTION>
			<OPTION value="1">該当せず</OPTION>
			<OPTION value="2" selected>該当</OPTION>
			break;
		</SELECT>

	<H5>丁目を有する町域名か</H5>
	<SELECT required name="town_attach_district">
	switch($row['town_attach_district'])
		case 1:
			<OPTION value="">-</OPTION>
			<OPTION value="1" selected>該当せず</OPTION>
			<OPTION value="2">該当</OPTION>
			break;
		case 2:
			<OPTION value="">-</OPTION>
			<OPTION value="1">該当せず</OPTION>
			<OPTION value="2" selected>該当</OPTION>
			break;
	</SELECT>

	<H5>一郵便番号で複数の町域か</H5>
	<SELECT required name="zip_code_multi_town">
	switch($row['zip_code_multi_town'])
		case 1:
			<OPTION value="">-</OPTION>
			<OPTION value="1" selected>該当せず</OPTION>
			<OPTION value="2">該当</OPTION>
			break;
		case 2:
			<OPTION value="">-</OPTION>
			<OPTION value="1">該当せず</OPTION>
			<OPTION value="2" selected>該当</OPTION>
			break;
	</SELECT>

	<H5>更新確認</H5>
	<SELECT required name="update_check">
	switch($row['town_double_zip_code'])
		case 1:
			<OPTION value="">-</OPTION>
			<OPTION value="1" selected>変更なし</OPTION>
			<OPTION value="2">変更あり</OPTION>
			<OPTION value="3">廃止</OPTION>
			break;
		case 2:
			<OPTION value="">-</OPTION>
			<OPTION value="1">変更なし</OPTION>
			<OPTION value="2" selected>変更あり</OPTION>
			<OPTION value="3">廃止</OPTION>
			break;
		case 3:
			<OPTION value="">-</OPTION>
			<OPTION value="1">変更なし</OPTION>
			<OPTION value="2">変更あり</OPTION>
			<OPTION value="3" selected>廃止</OPTION>break;
			break;
	</SELECT>

	<H5>更新理由</H5>
	<SELECT required name="update_reason">

	switch($row['town_double_zip_code'])
		case 1:
			<OPTION value="">-</OPTION>
			<OPTION value="1" selected>変更なし</OPTION>
			<OPTION value="2">市政・区政・町政・分区・政令指定都市施行</OPTION>
			<OPTION value="3">住居表示の実施</OPTION>
			<OPTION value="4">区画整理</OPTION>
			<OPTION value="5">訂正</OPTION>
			<OPTION value="6">廃止</OPTION>
		break;
		case 2:
			<OPTION value="">-</OPTION>
			<OPTION value="1">変更なし</OPTION>
			<OPTION value="2" selected>市政・区政・町政・分区・政令指定都市施行</OPTION>
			<OPTION value="3">住居表示の実施</OPTION>
			<OPTION value="4">区画整理</OPTION>
			<OPTION value="5">訂正</OPTION>
			<OPTION value="6">廃止</OPTION>
		break;
		case 3:
			<OPTION value="">-</OPTION>
			<OPTION value="1">変更なし</OPTION>
			<OPTION value="2">市政・区政・町政・分区・政令指定都市施行</OPTION>
			<OPTION value="3" selected>住居表示の実施</OPTION>
			<OPTION value="4">区画整理</OPTION>
			<OPTION value="5">訂正</OPTION>
			<OPTION value="6">廃止</OPTION>
		break;
		case 4;
			<OPTION value="">-</OPTION>
			<OPTION value="1">変更なし</OPTION>
			<OPTION value="2">市政・区政・町政・分区・政令指定都市施行</OPTION>
			<OPTION value="3">住居表示の実施</OPTION>
			<OPTION value="4" selected>区画整理</OPTION>
			<OPTION value="5">訂正</OPTION>
			<OPTION value="6">廃止</OPTION>
		break;
		case 5;
			<OPTION value="">-</OPTION>
			<OPTION value="1">変更なし</OPTION>
			<OPTION value="2">市政・区政・町政・分区・政令指定都市施行</OPTION>
			<OPTION value="3">住居表示の実施</OPTION>
			<OPTION value="4">区画整理</OPTION>
			<OPTION value="5" selected>訂正</OPTION>
			<OPTION value="6">廃止</OPTION>
		break;
		case 6;
			<OPTION value="">-</OPTION>
			<OPTION value="1">変更なし</OPTION>
			<OPTION value="2">市政・区政・町政・分区・政令指定都市施行</OPTION>
			<OPTION value="3">住居表示の実施</OPTION>
			<OPTION value="4">区画整理</OPTION>
			<OPTION value="5">訂正</OPTION>
			<OPTION value="6" selected>廃止</OPTION>
		break;

	</SELECT>
<br><br>

<input type="submit" value="確認">

</form>
</body>
</html>