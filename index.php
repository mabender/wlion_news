<html>
<head>
<link href="main.css" rel="stylesheet" type="text/css">
</head>
<title>Wlion Tech News!</title>
<body>
<div class='main'>
<table>
<tr><td class='header'>News Updates</td></tr>
<?php

// fix header

include 'connect.php';
include 'db.php';

$textlen = 650;

$db = new db();

if (isset($_GET['article'])) {
	if ($_GET['action'] == 'previous') {
		$article_from = $_GET['article'] - 5;
		$article_to = $_GET['article'] - 1;	
		
	} else {
		$article_from = $_GET['article'] + 5;
		$article_to = $_GET['article'] + 10;
	}
	// get article_id of prev listing
	$where = " where article_id between " . $article_from . " and " . $article_to;
} else {
	$where = "";	
}

$sql = "select * from article" . $where . " limit 5"; // limited select order by datatime desc
$rows = $db->retrieve($sql);

$current = $rows[0]['article_id'];
// inject css for tr, td, table, div
foreach ($rows as $row) {
	if (isset($row['subject'])) {
		echo "<tr><td class='subject'>" . $row['subject'];
	}
	if (isset($row['date'])) {
		echo "<tr><td class='date'>" . date('F j, Y', strtotime($row['date']) );
	}
	if (isset($row['author'])) {
		echo "<tr><td class='author'>" . $row['author']; // format date in db
	}
	if (isset($row['text'])) {
		if (strlen($row['text']) > 650) {
			$row['text'] = substr( $row['text'], 0, 650);
			$view_more = true;
		} else {
			$view_more = false;
		}	
		echo "<tr><td class='text'>" . $row['text']; // partil text display w/more if needed
		if ($view_more) {
			echo "<a href='article.php?article=" . $row['article_id'] . "'> ...read more</a>"; // add cute brackets
		}
	}
	echo "<tr><td class='share'><img src='share.png'>"; // find better share pics
}
echo "<tr>";
if ($current > 1) {
	echo "<td class='scroll'><a href='index.php?action=previous&article=" . $current . "'>Previous</a>";
}
if (count($rows) == 5) {
	echo "<td class='scroll'><a href='index.php?action=next&article=" . $current . "'>Next</a>";
}
// retrieve five articles based on article_id
// check for posted next/prev

//  load 5 articles

//  next/prev buttons set post var scroll 'next/prev' set post var 'first_article'

// cleanup vars and db
?>
</table>
</div>
</body>
</html>