<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>kadai4_1check.php</title>
<!-- form:テキストデータの受信（GETメソッド、２個のデータ） -->
</head>
<body>

<?php //if(isset($_POST)){echo $_POST;};?>

<form action="./kadai4_1complete.php" method="POST">
<?php
	//echo "a";
	//var_dump($_POST);
	//var_dump($_POST);

	//文字コード宣言
	//header("Content-Type: text/html; charset=UTF-8");

	//ポストデータの取得
	$input1 = $_POST["public_group_code"];
	$input2 = $_POST["zip_code_old"];
	$input3 = $_POST["zip_code"];
	$input4 = $_POST["prefecture_kana"];
	$input5 = $_POST["city_kana"];
	$input6 = $_POST["town_kana"];
	$input7 = $_POST["prefecture"];
	$input8 = $_POST["city"];
	$input9 = $_POST["town"];
	$input10 = $_POST["town_double_zip_code"];
	$input11 = $_POST["town_multi_address"];
	$input12 = $_POST["town_attach_district"];
	$input13 = $_POST["zip_code_multi_town"];
	$input14 = $_POST["update_check"];
	$input15 = $_POST["update_reason"];
;?>

<input type="hidden" name="input1" value="<?php echo $input1?>">
<input type="hidden" name="input2" value="<?php echo $input2?>">
<input type="hidden" name="input3" value="<?php echo $input3?>">
<input type="hidden" name="input4" value="<?php echo $input4?>">
<input type="hidden" name="input5" value="<?php echo $input5?>">
<input type="hidden" name="input6" value="<?php echo $input6?>">
<input type="hidden" name="input7" value="<?php echo $input7?>">
<input type="hidden" name="input8" value="<?php echo $input8?>">
<input type="hidden" name="input9" value="<?php echo $input9?>">
<input type="hidden" name="input10" value="<?php echo $input10?>">
<input type="hidden" name="input11" value="<?php echo $input11?>">
<input type="hidden" name="input12" value="<?php echo $input12?>">
<input type="hidden" name="input13" value="<?php echo $input13?>">
<input type="hidden" name="input14" value="<?php echo $input14?>">
<input type="hidden" name="input15" value="<?php echo $input15?>">

<input type="button" value="入力修正" onclick="history.back(-1)">
<button type="submit" name="submit">OK</button>

</form>
<?php

//出力
print "こちらでお間違えないでしょうかｗｗ"."<br>";

print "全国地方公共団体コード:".$input1."<br>";
print "旧郵便番号:".$input2."<br>";
print "郵便番号:".$input3."<br>";
print "都道府県名(半角カタカナ):".$input4."<br>";
print "市区町村名(半角カタカナ):".$input5."<br>";
print "町域名(半角カタカナ):".$input6."<br>";
print "都道府県名(漢字):".$input7."<br>";
print "市区町村名(漢字):".$input8."<br>";
print "町域名(漢字):".$input9."<br>";
print "一町域で複数の郵便番号か:".$input10."<br>";
print "小字毎に番地が起番されている町域か:".$input11."<br>";
print "丁目を有する町域名か:".$input12."<br>";
print "一郵便番号で複数の町域か:".$input13."<br>";
print "更新確認:".$input14."<br>";
print "更新理由:".$input15."<br>";


?>
</body>
</html>
