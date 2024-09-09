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

    }

    function updateUser($data, $id){
        // echo '<pre>';
        // var_dump($data);
        $users = getUser();
        foreach ($users as $i => $user) {
            if( $user['uuid'] == $id){
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

        $updated = file_put_contents('users.json', json_encode($users,));
        if($updated){
            return true;
        }else{
            return false;
        };

    }

    function deleteUser($id){

    }
?>