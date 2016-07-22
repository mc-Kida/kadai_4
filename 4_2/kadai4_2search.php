<?php
require_once 'db4_2.php';

$result = mysql_query("SELECT * FROM kadai_kida_ziplist");
if (!$result)
{
	echo("SQL失敗");
}

?>
<!DOCTYPE html>
<html>
<head>
<title>検索画面</title>
<meta charset="utf-8">
</head>
<body>
<h1>追加入力画面</h1>

<form action=""  name="search" method="post">

<!-- 検索範囲の指定 -->
<H5>検索範囲</H5>

	<SELECT name="range">
	<OPTION value="0">-</OPTION>
	<OPTION value="public_group_code">全国地方公共団体コード</OPTION>
	<OPTION value="zip_code_old">旧郵便番号</OPTION>
	<OPTION value="zip_code">郵便番号</OPTION>
	<OPTION value="prefecture_kana">都道府県名(半角カタカナ)</OPTION>
	<OPTION value="city_kana">市区町村名(半角カタカナ)</OPTION>
	<OPTION value="town_kana">町域名(半角カタカナ)</OPTION>
	<OPTION value="prefecture">都道府県名(漢字)</OPTION>
	<OPTION value="city">市区町村名(漢字)</OPTION>
	<OPTION value="town">町域名(漢字)</OPTION>
	<OPTION value="town_double_zip_code">一町域で複数の郵便番号か</OPTION>
	<OPTION value="town_multi_address">小字毎に番地が起番されている町域か</OPTION>
	<OPTION value="town_attach_district">丁目を有する町域名か</OPTION>
	<OPTION value="zip_code_multi_town">一郵便番号で複数の町域か</OPTION>
	<OPTION value="update_check">更新確認</OPTION>
	<OPTION value="update_reasons">更新理由</OPTION>

	</SELECT><br><br><br>


<!-- 検索項目入力 -->
検索キーワード：<input type="text" name="keyword"><br>

<input type="submit" name="submit" value="検索">

<?php

//var_dump($_POST);


//検索範囲内でキーワードを含む列の列挙するためのツール
//

$search = mysql_query("SELECT * FROM kadai_kida_ziplist WHERE $_POST[range] = $_POST[keyword]");

//$row = mysql_fetch_row($search);
//var_dump($search);
//var_dump($row);


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

while ($row = mysql_fetch_array($search))
{
	print"<tr>";
	echo'<td>' .$row["public_group_code"] .'</td>';
	echo'<td>' .$row["zip_code_old"] .'</td>';
	echo'<td>' .$row["zip_code"] .'</td>';
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

echo "<br><hr><br>";

/**************************************
 * ここから全体リスト
 * ************************************/

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



while ($row = mysql_fetch_array($result))
{
	print"<tr>";
	echo'<td>' .$row["public_group_code"] .'</td>';
	echo'<td>' .$row["zip_code_old"] .'</td>';
	echo'<td>' .$row["zip_code"] .'</td>';
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

/*
// foreach文で配列の中身を一行ずつ出力
foreach ((array)$search as $row)
{
	// データベースのフィールド名で出力
	print"<tr>";
	echo'<td>' .$row["public_group_code"] .'</td>';
	echo'<td>' .$row["zip_code_old"] .'</td>';
	echo'<td>' .$row["zip_code"] .'</td>';
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
	{
		print'<td>'.("廃止  ").'</td>';
	}

	// 改行を入れる
	echo '<br>';
}
	print"</tr>";
if ($search)
{
	echo("OK");
}*/

?>

</form>
</body>
</html>

