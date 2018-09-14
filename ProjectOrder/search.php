
<?php
require_once("lib/connect.php");

$text = $link->real_escape_string($_GET['term']);

$query = "SELECT * FROM of_food WHERE name LIKE '%$text%'";
$result = $link->query($query);
$json = '[';
$first = true;
while($row = $result->fetch_assoc())
{
    if (!$first) { $json .=  ','; } else { $first = false; }
    $json .= '{"value":"'.$row['name'].'"}';
}
$json .= ']';
echo $json;
?>