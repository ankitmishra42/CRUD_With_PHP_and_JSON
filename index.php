<?php
    require 'users.php';
    $users = getUser();
    if (isset($users)):
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD_With_PHP_and_JSON</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>User's Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Profile_Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['name'] ?></td>
                <td><?php echo $user['email'] ?></td>
                <td><?php echo $user['phone'] ?></td>
                <td><?php echo $user['gender'] ?></td>
                <td>
                    <a target="blank" href="<?php echo $user['picture'] ?>">Profile</a>
                </td>
                <td>
                    <a target="blank" href="moreAbout.php?id=<?php echo $user['uuid'] ?>">MoreAbout</a>
                    <a href="update.php?id=<?php echo $user['uuid'] ?>">UPDATE</a>
                    <a href="delete.php?id=<?php echo $user['uuid'] ?>">DELETE</a>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</body>
</html>

<?php endif ?>
