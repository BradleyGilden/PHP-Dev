<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my PHP journey</title>

    <style>
        html, body {
            box-sizing: border-box;
            padding: 0px;
            margin: 0px;
            width: 100vw;
        }
    </style>
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
    <br />
    <?= include('./form.php') ?>

    <?php
    // use $_REQUEST for either one, or cookie data
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
    
        // Process the data
        echo "From \$_POST<br />";
        echo "Name: $name <br />";
        echo "Email: $email <br />";

        unset($_POST['name']);
        unset($_POST['email']);
    } elseif(isset($_GET['name'])) {
        $name = $_GET['name'];
        $email = $_GET['email'];
    
        // Process the data
        echo "From \$_GET<br />";
        echo "Name: $name <br />";
        echo "Email: $email <br />";

        unset($_GET['name']);
        unset($_GET['email']);
    }
    ?>
</body>
</html>
