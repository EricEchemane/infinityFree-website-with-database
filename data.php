<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">

    <title>Remy Activity 1</title>

    <style>
        table {
            margin: 2rem auto;
        }

        th,
        td {
            padding: 1rem;
            max-width: 20ch;
            text-overflow: ellipsis;
            word-wrap: unset;
            white-space: nowrap;
            overflow: hidden;
        }

        #back {
            position: fixed;
            bottom: 1rem;
            left: 1rem;
        }
    </style>
</head>

<body>
    <?php
    // $db = new mysqli('localhost', 'root', '', 'test') or die(mysqli_error($db));
    $db = new mysqli('sql212.epizy.com', 'epiz_30916573', 'AIuX60oaGosXRl', 'epiz_30916573_random') or die(mysqli_error($db));
    $result = $db->query("SELECT * from app_credentials") or die($db->error);
    ?>

    <div>
        <table>
            <thead>
                <tr>
                    <th>App Id</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>Middle</th>
                    <th>email</th>
                    <th>Token</th>
                    <th>Secret</th>
                    <th>Password</th>
                    <th>Image</th>
                </tr>
            </thead>
            <?php while ($row = $result->fetch_assoc()) : ?>
                <tr>
                    <td> <?php echo $row['id']; ?> </td>
                    <td> <?php echo $row['last_name']; ?> </td>
                    <td> <?php echo $row['first_name']; ?> </td>
                    <td> <?php echo $row['middle_name']; ?> </td>
                    <td> <?php echo $row['email']; ?> </td>
                    <td> <?php echo $row['token']; ?> </td>
                    <td> <?php echo $row['_secret']; ?> </td>
                    <td> <?php echo $row['_password']; ?> </td>
                    <td>
                        <?php
                        echo '<img width="50px" src="data:image/jpeg;base64,' . $row['photo'] . ' " />';
                        ?>
                    </td>
                </tr>
            <?php endwhile ?>
        </table>
    </div>

    <a href="http://cire.epizy.com" class='link-btn' id="back"> Back </a>
    <!-- ----------------------------------------------------------- -->
</body>

</html>