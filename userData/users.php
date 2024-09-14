<?php
    function getUser(){
        $data = file_get_contents('users.json');
        // $data = file_get_contents("https://randomuser.me/api/?results=10");

        $user = json_decode($data, true);
        // echo "<pre>";
        // var_dump($user);
        return $user;
    }

    function getUserById($id){
        $users = getUser();
        // var_dump($users);
        foreach ($users as $user) {
            if( $user['uuid'] == $id){
                return $user;
            }
        }
        return null;
    }

    function createUser($data){
        $users = getUser();
        $data['uuid'] = (string)random_int(10000000, 90000000);
        $data['username'] = strtolower($data['name']).$data['uuid'];
        $users[] = $data;
        trim($data['username']);
        
        // var_dump($users);
        $newUserAdded = file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));
        if($newUserAdded){
            return true;
        }else{
            return false;
        };
    }

    function updateUser($data, $id){
        // echo '<pre>';
        // var_dump($data);
        $users = getUser();
        foreach ($users as $i => $user) {
            if( $user['uuid'] == $id){
                if (!isset($data)) {
                    $data['picture'] = $user["picture"];
                }
                $users[$i] = array_merge( $user, $data );
            }
        }

        // $file = fopen('users.json','w+');
        // if($file){
        //     fwrite($file, json_encode($users));
        //     fclose($file);
        //     return true;
        // }else{
        //     return false;
        // };

        $updated = file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT) );
        if($updated){
            return true;
        }else{
            return false;
        };

    }
    
    function uploadPicture($DATA){
        $fileTmpPath = $_FILES['picture']['tmp_name'];

        // Define the upload directory and move the file
        $uploadDir = 'userData/images/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true); // Create directory if it doesn't exist
        }
        $filePath = "userData/images/".$_FILES['picture']['name'];
    
        if (!move_uploaded_file($fileTmpPath, $filePath)) {
            die("Failed to move uploaded file.");
        }
    
        
        // Add new metadata to existing data
        $DATA['picture'] = $filePath;
        return $DATA;
    }
    function deleteUser($id){
        $users = getUser();
        // var_dump($users);
        foreach ($users as $i => $user) {
            if( $user['uuid'] == $id){
                // unset($users[$i]);
                array_splice($users, $i, length:1);
            }
        }
        
        $uploaded = file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT) );
        if($uploaded){
            return true;
        }else{
            return false;
        }
    }
?>