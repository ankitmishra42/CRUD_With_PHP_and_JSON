<?php
    require "userData/users.php";
    
    // echo '<pre>';
    // var_dump($_SERVER['REQUEST_METHOD'])
    if ($_SERVER['REQUEST_METHOD']==='POST'){

        // Check if a file has been uploaded
        if (isset($_FILES['picture'])& $_FILES['picture']['error'] === UPLOAD_ERR_OK) {
            // echo'<pre>';
            // var_dump($_FILES);

            // var_dump($_POST);

            //uploading photos
            $DATA = uploadPicture($_POST);

            echo "File uploaded and metadata successfully saved to $filePath";
        }else {
            $_POST['picture'] = "";
            $DATA = $_POST;
        }
        
        // var_dump($DATA);
        $result = createUser($DATA);
        if ($result) {
            header('location: ./index.php');
        }else{
            echo 'Your Info have Not uploaded! Try again';
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD_With_PHP_and_JSON4</title>
    <style>

    </style>
</head>
<body>
    <header>
        <h1>Create New User Account:</h1>
    </header>
    <main>
        <form method="POST" enctype="multipart/form-data" action="">
            <div>
                <label for="name">Name</label>
                <input id="name" name="name" type="text" placeholher="">
            </div>
            <div>
                <label for="gender">Gender</label>
                <input id="gender" name="gender" type="text" placeholher="">
            </div>
            <div>
                <label for="location">Location</label>
                <input id="location" name="location" type="text" placeholder="Enter Your Location">
            </div>
            <div>
                <label for="email">Email</label>
                <input id="email" name="email" type="email" placeholher="">
            </div>
            <div>
                <label for="password">Password</label>
                <input id="password" name="password" type="password" placeholher="">
            </div>
            <div>
                <label for="dob">DOB</label>
                <input id="dob" name="dob" type="date" placeholher="">
            </div>
            <div>
                <label for="phone">Phone</label>
                <input id="phone" name="phone" type="tel" placeholher="" ">
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