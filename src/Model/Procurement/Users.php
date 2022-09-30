<?php
namespace App\Model\Procurement;

use App\Database\DbProcurement;

class Users extends DbProcurement {
     public function createUser() {
         $password = password_hash('123456',PASSWORD_DEFAULT);

         $sql = "
            INSERT INTO tb_users (
                username,
                password,
                fullname
            ) VALUES (
                'kanjana.su',
                '".$password."',
                'กาญจนา สังข์ทอง'
            )
         ";
         $stmt = $this->pdo->query($sql);
         return true;
     }

     public function checkUser($user) {
         $sql = "
            SELECT
                *
            FROM
                tb_users
            WHERE
                username = ?
         ";
         $stmt = $this->pdo->prepare($sql);
         $stmt->execute([$user['username']]);
         $data = $stmt->fetchAll();
         $userDB = $data[0];
         if(password_verify($user['password'],$userDB['password'])) {
            session_start();
            $_SESSION['fullname'] = $userDB['fullname'];
            $_SESSION['username'] = $userDB['username'];
            $_SESSION['login'] = true;

            return true;
         } else {
            return false;
         }
     }
     
 }


?>