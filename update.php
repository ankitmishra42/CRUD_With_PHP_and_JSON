<?php
    $userId = $_GET['id'];

    require "users.php";
    $user = getUserById($userId);
    if (!isset($_GET["id"])) {
        echo 'Id Not Found';
        exit;
    }
    if (!$user) {
        echo 'Id Not Found';
        exit;
    }

    // echo '<pre>';
    // var_dump($_SERVER['REQUEST_METHOD'])
    if ($_SERVER['REQUEST_METHOD']==='POST') {
        // $result = updateUser($_POST, $userId);
        if (isset($_FILES['picture'])& $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
            echo'<pre>';
            var_dump($_FILES);
        }
        // if ($result) {
        //     header('location: index.php');
        // }else{
        //     echo 'Your Info have Not updated! Try again';
        // }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD_With_PHP_and_JSON3</title>
    <style>

    </style>
</head>
<body>
    <header>
        <h1>Update User Details:</h1>
    </header>
    <main>
        <form method="POST" enctype="multipart/form-data" action="">
            <div>
                <label for="name">Name</label>
                <input id="name" name="name" type="text" value="<?php echo $user['name']; ?>">
            </div>
            <div>
                <label for="gender">Gender</label>
                <input id="gender" name="gender" type="text" value="<?php echo $user['gender']; ?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" value="<?php echo $user['email']; ?>">
            </div>
            <div>
                <label for="phone">Phone</label>
                <input id="phone" name="phone" type="tel" value="<?php echo $user['phone']; ?>">
            </div>
            <div>
                <label for="picture">Image</label>
                <input id="picture" name="picture" type="file">
            </div>
            <div>
                <button>UPDATE</button>
            </div>
        </form>
    </main>
</body>
</html>