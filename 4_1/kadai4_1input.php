<!DOCTYPE html>
<html>
<head>
<title>フォーム画面</title>
<meta charset="utf-8">
</head>
<body>
<h1>追加入力画面</h1>

<form action="kadai4_1check.php" method="post">
	全国地方公共団体コード   ：<input required type="text" name="public_group_code" maxlength='5'  pattern="^[0-9]+$"><br>

	旧郵便番号               ：<input required type="text" name="zip_code_old" maxlength='3'  pattern="^[0-9]+$"><br>

	郵便番号                 ：<input required type="text" name="zip_code" maxlength='7'  pattern="^[0-9]+$"><br>

	都道府県名(半角カタカナ) ：<input required type="text" name="prefecture_kana"><br>

	市区町村名(半角カタカナ) ：<input required type="text" name="city_kana"><br>

	町域名(半角カタカナ)     ：<input required type="text" name="town_kana"><br>

	都道府県名(漢字)         ：<input required type="text" name="prefecture"><br>

	市区町村名(漢字)         ：<input required type="text" name="city"><br>

	町域名(漢字)             ：<input required type="text" name="town"><br>

	<H5>一町域で複数の郵便番号か</H5>
	<SELECT required name="town_double_zip_code" >
	<OPTION value="">-</OPTION>
	<OPTION value="1">該当せず</OPTION>
	<OPTION value="2">該当</OPTION>
	</SELECT>

	<H5>小字毎に番地が起番されている町域か</H5>
	<SELECT required name="town_multi_address">
	<OPTION value="">-</OPTION>
	<OPTION value="1">該当せず</OPTION>
	<OPTION value="2">該当</OPTION>
	</SELECT>

	<H5>丁目を有する町域名か</H5>
	<SELECT required name="town_attach_district">
	<OPTION value="">-</OPTION>
	<OPTION value="1">該当せず</OPTION>
	<OPTION value="2">該当</OPTION>
	</SELECT>

	<H5>一郵便番号で複数の町域か</H5>
	<SELECT required name="zip_code_multi_town">
	<OPTION value="">-</OPTION>
	<OPTION value="1">該当せず</OPTION>
	<OPTION value="2">該当</OPTION>
	</SELECT>

	<H5>更新確認</H5>
	<SELECT required name="update_check">
	<OPTION value="">-</OPTION>
	<OPTION value="1">変更なし</OPTION>
	<OPTION value="2">変更あり</OPTION>
	<OPTION value="3">廃止</OPTION>
	</SELECT>

	<H5>更新理由</H5>
	<SELECT required name="update_reason">
	<OPTION value="">-</OPTION>
	<OPTION value="1">変更なし</OPTION>
	<OPTION value="2">市政・区政・町政・分区・政令指定都市施行</OPTION>
	<OPTION value="3">住居表示の実施</OPTION>
	<OPTION value="4">区画整理</OPTION>
	<OPTION value="6">訂正</OPTION>
	<OPTION value="7">廃止</OPTION>
	</SELECT>
<br>


<input type="submit" value="確認">

<!-- 未入力項目検出 -->
<?php

	var_dump($_POST);

	if(!$_POST['public_group_code'])
	{
		echo("全国地方公共団体コードが未記入です");
	};

	if(!isset($_POST['zip_code_old']))
	{
		echo("旧郵便番号が未記入です");
	};

	if(!isset($_POST['zip_code']))
	{
		echo("郵便番号が未記入です");
	};

	if(!isset($_POST['prefecture_kana']))
	{
		echo("都道府県名(半角カタカナ)が未記入です");
	};


	if(!isset($_POST['city_kana']))
	{
		echo("全市区町村名(半角カタカナ)が未記入です");
	};

	if(!isset($_POST['town_kana']))
	{
		echo("町域名(半角カタカナ)が未記入です");
	};


	if(!isset($_POST['prefecture']))
	{
		echo("都道府県名(漢字)が未記入です");
	};

	if(!isset($_POST['city']))
	{
		echo("市区町村名(漢字)が未記入です");
	};

	if(!isset($_POST['town']))
	{
		echo("町域名(漢字)が未記入です");
	};

	if(!isset($_POST['town_double_zip_code']))
	{
		echo("一町域で複数の郵便番号か　が未記入です");
	};


	if(!isset($_POST['town_multi_address']))
	{
		echo("小字毎に番地が起番されている町域か　が未記入です");
	};

	if(!isset($_POST['town_attach_district']))
	{
		echo("丁目を有する町域名か　が未記入です");
	};


	if(!isset($_POST['zip_code_multi_town']))
	{
		echo("一郵便番号で複数の町域か　が未記入です");
	};


	if(!isset($_POST['update_check']))
	{
		echo("更新確認が未記入です");
	};


	if(!isset($_POST['update_reason']))
	{
		exit("更新理由が未記入です");
	};


//if(isset($_POST)){echo $_POST;};



?>


</form>

</body>
</html>