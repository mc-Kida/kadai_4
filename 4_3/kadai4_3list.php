<!DOCTYPE html>
<html>
<head>
<title>リスト一覧</title>
<meta charset="utf-8">
</head>
<body>

<?php
	//データベース呼び出し
	require_once 'db4_3.php';

	//検索結果の全体表示
	print <<<EOT
	<table border='1'>
	<tr>
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

	$result = mysql_query("SELECT * FROM kadai_kida_ziplist");
	if (!$result)
	{
		echo("SQL失敗");
	}

	while ($row = mysql_fetch_array($result))
	{
		$ZC = $row["zip_code"];
		$Zlink = "<a href='http://http://dev3.m-craft.com/kida/mc-kadai/4_3/kadai4_3list.php?data=$ZC'>".$row["zip_code"]."</a>";
		print"<tr>";
		echo'<td>' .$row["public_group_code"] .'</td>';
		echo'<td>' .$row["zip_code_old"] .'</td>';
		echo'<td>' .$Zlink .'</td>';
		echo'<td>' .$row["prefecture_kana"] .'</td>';
		echo'<td>' .$row["city_kana"] .'</td>';
		echo'<td>' .$row["town_kana"] .'</td>';
		echo'<td>' .$row["prefecture"] .'</td>';
		echo'<td>' .$row["city"] .'</td>';
		echo'<td>' .$row["town"] .'</td>';

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
		else

			print'<td>'.("廃止  ").'</td>';
		}

		print'</tr>';

	print "</table>";


	//結果セットの開放
	mysql_free_result ($result) ;

	//データベースから切断
	//mysql_close($link) ;

?>

<form action="kadai4_3update.php" method="post">
<!-- <input type="submit" value="更新申請"> -->
</form>

</body>
</html>
