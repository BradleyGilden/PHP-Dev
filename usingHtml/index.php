<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my PHP journey</title>
</head>
<body>
    <?= include('./nav.php') ?>
    <h1>Using PHP in html</h1>
    <br/>
    <p>
        <?= 'This is php shorthand for echo' ?>
    </p>
    <p>
        <?php
            echo 'or we can establish robust implementations'
        ?>
    </p>
    <?= $mylist = ['apples', 'grapes', 'tissues', 'bleach'] ?>

    <ul>
        <?php foreach ($mylist as $item):
            echo "<li>$item</li>";
        endforeach;?>
        
    </ul>
</body>
</html>
