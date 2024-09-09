<?php
    $userId = $_GET['id'];

    if (!isset($_GET["id"])) {
        echo 'Id Not Found';
        exit;
    }
    require "users.php";
    $user = getUserById($userId);
    
    if (!$user) {
        echo 'Id Not Found';
        exit;
    }
    // echo '<pre>';
    // var_dump($user)
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD_With_PHP_and_JSON2</title>
    <style>
        table{
            margin-left: 15vw;
            margin-top: 5vw;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Name: </th>
            <td><?php echo $user['name']; ?></td>
        
        </tr>
        <tr>
            <th>Email: </th>
            <td><?php echo $user['email']; ?></td>
        </tr>
        <tr>
            <th>Phone: </th>
            <td><?php echo $user['phone']; ?></td>
        </tr>
        <tr>
            <th>Gender: </th>
            <td><?php echo $user['gender']; ?></td>
        </tr>
        <tr>
            <th>Photo: </th>
            <td>
                <a href="<?php echo $user['picture'] ?>">Profile</a>
            </td>
        </tr>
    </table>
</body>
</html>