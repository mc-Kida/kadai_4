<?php
//データベース呼び出し
require_once 'db4_4.php';
$result = mysql_query("SELECT * FROM kadai_kida_ziplist");
if (!$result)
{
	echo("SQL失敗");
}
?>
<!DOCTYPE html>
<html>
<head>
<META HTTP-EQUIV="Content-Script-Type" CONTENT="text/javascript">
<TITLE>チェックボックスを全チェックON/OFFとする方法</TITLE>

<title>リスト一覧</title>
<meta charset="utf-8">
</head>
<body>

<?php if(isset($_POST)){var_dump($_POST);};?>

<form name="nForm" action="" method="post">
<?php
	//検索結果の全体表示
	print <<<EOT
	<table border='1'>
	<tr>
	<th>削除選択☑</th>
	<th>全国地方公共団体コード</th>
	<th>旧郵便番号</th>
	<th>郵便番号</th>
	<th>都道府県名(半角カタカナ)</th>
	<th>市区町村名(半角カタカナ)</th>
	<th>町域名(半角カタカナ)</th>
	<th>都道府県名(漢字)</th>
	<th>市区町村名(漢字)</th>
	<th>町域名(漢字)</th>
	<th>一町域で複数の郵便番号か</th>
	<th>小字毎に番地が起番されている町域か</th>
	<th>丁目を有する町域名か</th>
	<th>一郵便番号で複数の町域か</th>
	<th>更新確認</th>
	<th>更新理由</th>
	</tr>
EOT;

	while ($row = mysql_fetch_array($result))
	{
		$ZC = $row["zip_code"];
		$Zlink = "<a href='http://localhost/kadai/kadai_4/4_4/kadai4_4deletecheck.php?data=$ZC'>".$row["zip_code"]."</a>";

		print"<tr>";
		print'<td>'."<input type='checkbox' name='checkbox' value='$ZC'>".'</td>';  //☑設置
		print'<td>' .$row["public_group_code"] .'</td>';
		print'<td>' .$row["zip_code_old"] .'</td>';
		print'<td>' .$Zlink .'</td>';
		print'<td>' .$row["prefecture_kana"] .'</td>';
		print'<td>' .$row["city_kana"] .'</td>';
		print'<td>' .$row["town_kana"] .'</td>';
		print'<td>' .$row["prefecture"] .'</td>';
		print'<td>' .$row["city"] .'</td>';
		print'<td>' .$row["town"] .'</td>';

		if ($row["town_double_zip_code"] = 1 )
		{
			print'<td>'.("該当  ").'</td>';
		}
		else
		{
			print'<td>'.("該当せず  ").'</td>';
		}

		if ($row["town_multi_address"] = 1 )
		{
			print'<td>'.("該当  ").'</td>';
		}
		else
		{
			print'<td>'.("該当せず  ").'</td>';
		}

		if ($row["town_attach_district"] = 1 )
		{
			print'<td>'.("該当  ").'</td>';
		}
		else
		{
			print'<td>'.("該当せず  ").'</td>';
		}

		if ($row["zip_code_multi_town"] = 1 )
		{
			print'<td>'.("該当  ").'</td>';
		}
		else
		{
			print'<td>'.("該当せず  ").'</td>';
		}

		if ($row["update_check"] = 0 )
		{
			print'<td>'.("変更なし  ").'</td>';
		}
		elseif ($row["update_check"] = 1)
		{
			print'<td>'.("変更あり  ").'</td>';
		}
		else
		{
			print'<td>'.("廃止  ").'</td>';
		}

		if ($row["update_reason"] = 0 )
		{
			print'<td>'.("変更なし  ").'</td>';
		}
		elseif ($row["update_reason"] = 1)
		{
			print'<td>'.("市政・区政・町政・分区・政令指定都市施行  ").'</td>';
		}
		elseif ($row["update_reason"] = 2)
		{
			print'<td>'.("住居表示の実施  ").'</td>';
		}
		elseif ($row["update_reason"] = 3)
		{
			print'<td>'.("区画整理  ").'</td>';
		}
		elseif ($row["update_reason"] = 4)
		{
			print'<td>'.("郵便区調整等  ").'</td>';
		}
		elseif ($row["update_reason"] = 5)
		{
			print'<td>'.("訂正  ").'</td>';
		}
		else{

			print'<td>'.("廃止  ").'</td>';
		}
	}

	print'</tr>';

	print "</table>";


	//結果セットの開放
	mysql_free_result ($result) ;

	//データベースから切断
	//mysql_close($link) ;

?>

<INPUT TYPE="button" onClick="chBxSw(true);" VALUE="全て選択">
<INPUT TYPE="button" onClick="chBxSw(false);" VALUE="全て未選択"><BR><BR>

<input type="submit" value="削除申請">
</form>

<SCRIPT type="text/javascript">
//フォームオブジェクトの配列の個数の取得
var i;

 // 全てのチェックボックをチェックする
function chBxSw(sw)
{
   for(i=0; i<document.nForm.checkbox.length; i++)
	{
	   document.nForm.checkbox[i].checked = sw;
	}
}

</SCRIPT>
</body>
</html>
