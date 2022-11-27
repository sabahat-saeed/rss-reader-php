
<?php
if (count($data) > 0) {
    echo "Items \n";
    foreach ($data as $key => $value) {
        echo "Item : " . ($key + 1) . "\n";
        echo "Title : " . $value['title'] . "\n";
        echo "Description: ".$value['description'] . "\n";
        echo "Published : " . $value['pubDate'] . "\n";
        echo "\n";
    }
} else {
    echo "No record found</h3>";
}
?>
