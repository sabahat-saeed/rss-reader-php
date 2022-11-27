
<?php
if (count($data) > 0) {
    $text = "";
    $text .= "Items \n";
    foreach ($data as $key => $value) {
        $text .= "Item : " . ($key + 1) . "\n";
        $text .= "Title : " . $value['title'] . "\n";
        $text .= "Description : " . $value['description'] . "\n";
        $text .= "Published : " . $value['pubDate'] . "\n";
        $text .= "\n";
    }
} else {
    $text .= "No record found</h3>";
}
echo $text;
?>
