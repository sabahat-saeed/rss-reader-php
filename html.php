<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>
    <?php if (count($data) > 0) { ?>
        <h3>Items</h3>
        <?php foreach ($data as $key => $value) { ?>
            <div><b>Item : <?php echo ($key + 1) ?></b></div>
            <div><b>Title</b> : <a href="<?php echo $value['link'] ?>" target="_blank"><?php echo $value['title'] ?></a></div>
            <div><b>Description</b> : <?php echo $value['description'] ?></div>
            <div><b>Published</b> : <?php echo $value['pubDate'] ?></div>
            <br>
            <br>
        <?php } ?>
    <?php } else { ?>
        <h3>No record found</h3>
    <?php } ?>

</body>

</html>