
<?php
session_start();
require_once("lib/connect.php");
$text = $link->real_escape_string($_GET['term']);
$lang = $_SESSION['lang'].'_name';
$query = "SELECT * FROM of_food WHERE $lang LIKE '%$text%'";
$result = $link->query($query);
$json = '[';
$first = true;
while($row = $result->fetch_assoc())
{
    if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$row[$_SESSION['lang'].'_name'].'"}';
}
$json .= ']';
echo $json;
?>