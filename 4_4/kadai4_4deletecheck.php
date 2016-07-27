<?php
	var_dump($_POST[]);
?>
<!DOCTYPE html>
<html>
<head>
<title>リスト一覧</title>
<meta charset="utf-8">
</head>
<body>
<form action="kadai4_4list.php" method="post">
<?php
$data = $_POST['checkbox[]'];
// フォームからPOSTデータを受け取った場合
if( isset($_POST['checkbox[]']) )
{
	//検索によるデータ牽引
	require_once 'db4_4.php';
	$search = mysql_query("SELECT * FROM kadai_kida_ziplist WHERE zip_code = $data");
	$row = mysql_fetch_array($search);

	echo "$data";


	$chks = $_POST['checkbox'];
	// $chks = $_POST['checkbox[]']; と書くと間違いなので注意

	print "<p>削除したいのは・・・<br />\n";
	foreach( (array)$search as $c )
	{
		// formから受け取ったcheckboxのデータは配列になっています。
		// よって、foreachなどを使って
		// 処理する必要があります。
		print "{$c}<br />\n";
	}
	print "でいいでしょうか？</p>\n";
	print "<input type='button' value='ＮＯ' onclick='history.back(-1)'>";
	print "<button type='submit' name='submit'>ＯＫ</button>";

}

//データがなかった場合
else
{
	print "<p>項目が一つも選択されていません。</p><br>";
	print "<input type='button' value='入力修正' onclick='history.back(-1)'>";
}

?>

 <!-- ↓JavaScriptを呼び出します。 -->


</form>

</body>
</html>
