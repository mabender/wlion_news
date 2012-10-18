<html>
<head>
<link href="main.css" rel="stylesheet" type="text/css">
</head>
<title>Wlion News Article</title>
<body>
<div class='article'>
<table>
<?php

include 'connect.php';
include 'db.php';

$db = new db();

$article = $_GET['article'];
$rows = $db->retrieve("select count(*) from article");
$count = $rows[0]['count(*)'];

$sql = "select * from article where article_id = $article";
$rows = $db->retrieve($sql);
echo "<tr><td class='article_subject'>" . $rows[0]['subject'];
echo "<tr><td class='article_author'>" . $rows[0]['author'];
echo "<tr><td class='article_date'>" . date('F j, Y', strtotime($rows[0]['date']));
echo "<tr><td class='article_text'>" . $rows[0]['text'];
if ($article != 1) {
	$link = $article - 1;
	echo "<tr><td class='article_link'><a href='article.php?article=" . $link . "'>Previous</a>";
}
if ($article < $count) {
	$link = $article + 1;
	echo "<tr><td class='article_link'><a href='article.php?article=" . $link . "'>Next</a>";	
}

echo "<tr><td><a href='index.php'>Back to list</a>";
?>
</table>
</div>
</body>
</html>
