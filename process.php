<html lang="en">

<head>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php

    // $db = new mysqli('localhost', 'root', '', 'test') or die(mysqli_error($db));
    $db = new mysqli('sql212.epizy.com', 'epiz_30916573', 'AIuX60oaGosXRl', 'epiz_30916573_random') or die(mysqli_error($db));

    if (isset($_POST['save'])) {
        $lastName = $_POST['lastName'];
        $firstName = $_POST['firstName'];
        $middleName = $_POST['middleName'];
        $email = $_POST['email'];
        $id = $_POST['id'];
        $token = $_POST['token'];
        $_secret = $_POST['secret'];
        $_password = $_POST['password'];
        $photo = base64_encode(file_get_contents($_FILES['photo']['tmp_name']));

        $db->query("INSERT INTO app_credentials (id, last_name, first_name, middle_name, email, token, _secret, _password, photo) VALUES ('$id', '$lastName', '$firstName', '$middleName', '$email', '$token', '$_secret', '$_password', '$photo')") or die($db->error);

        header("location: http://cire.epizy.com/data.php");
        // header("location: http://localhost:2900/data.php");
    }

    ?>
</body>

</html>