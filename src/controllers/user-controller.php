<?php
// require __DIR__ . '/db.php';

class UserController{


    public function register($user,$pdo){
        $statement = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $statement->execute(array($user->getEmail()));

        if ($statement->rowCount() > 0) {
            return false;
        } else {
            $statement = $pdo->prepare("INSERT INTO users (firstname, lastname, email, phone, address, password, created) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $statement->execute(array($user->getFirstName(), $user->getLastName(), $user->getEmail(), $user->getPhone(), $user->getAddress(), $user->getPassword(), $user->getCreated()));
            return true;    
        }

        return true;
    }

    public function login($email,$pwd,$pdo){
        $statement = $pdo->prepare("SELECT * FROM users WHERE email=?");
        $statement->execute(array($email));
        if($statement->rowCount() > 0){
            return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
        //     if(strcmp($pwd, $result['password'])==0) {
        //        return true;
        //     }else{
        //         return false;
        //     }
        }
        return NULL;
    }



    // public function resetPwd($email, $password){
    //     // $statement = $pdo->prepare("UPDATE users SET password=?, code=?, expiration=? WHERE email=?");
    //     // $statement->execute(array($password, 0, 0,$email));
    
    // }

    public function updateFirstName($firstname,$email,$pdo){
        $statement = $pdo->prepare("UPDATE users SET firstname=? WHERE email=?");
        $statement->execute(array($firstname, $email));    
    }

    public function updateLastName($lastName,$email,$pdo){
        $statement = $pdo->prepare("UPDATE users SET lastname=? WHERE email=?");
        $statement->execute(array($lastName, $email));    
    }

    public function updateAddress($address,$email,$pdo){
        $statement = $pdo->prepare("UPDATE users SET address=? WHERE email=?");
        $statement->execute(array($address,$email));
    }
    public function updatePhone($phone,$email,$pdo){
        $statement = $pdo->prepare("UPDATE users SET phone=? WHERE email=?");
        $statement->execute(array($phone, $email));
    }

    // for admin
    public function updateFirstNameById($firstname,$id,$pdo){
        $statement = $pdo->prepare("UPDATE users SET firstname=? WHERE id=?");
        $statement->execute(array($firstname, $id));    
    }

    public function updateLastNameById($lastName,$id,$pdo){
        $statement = $pdo->prepare("UPDATE users SET lastname=? WHERE id=?");
        $statement->execute(array($lastName, $id));    
    }

    public function updateAddressById($address,$id,$pdo){
        $statement = $pdo->prepare("UPDATE users SET address=? WHERE id=?");
        $statement->execute(array($address,$id));
    }
    public function updatePhoneById($phone,$id,$pdo){
        $statement = $pdo->prepare("UPDATE users SET phone=? WHERE id=?");
        $statement->execute(array($phone, $id));
    }
    
    public function updateEmaileById($email,$id,$pdo){
        $statement = $pdo->prepare("UPDATE users SET email=? WHERE id=?");
        $statement->execute(array($email, $id));
    }

    public function deleteUser($id,$pdo){
        $statement = $pdo->prepare("DELETE FROM users WHERE id=?");
        $statement->execute(array($id));
    }

    public function fetchAll($pdo){
        $statement = $pdo->prepare("SELECT * FROM users");
        $statement->execute();
        if($statement->rowCount() > 0) {
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return NULL;
    }

    public function updateUserInfo($user,$email,$pdo){
        echo 'hello';
        $firstname = $user->getFirstName();
        $statement = $pdo->prepare("UPDATE users SET firstname=? WHERE email=?");
        // $statement->execute(array($firstname, $email);
      
        // if(isset(request['firstname'])) {
        //     $firstname = $user->getFirstName();
        //     $statement = $pdo->prepare("UPDATE users SET firstname=? WHERE email=?");
        //     $statement->execute(array($firstname, $email);
        //   }
        //   if(isset(request['lastname'])) {
        //     $lastname = $user->getLastName();
        //     $statement = $pdo->prepare("UPDATE users SET lastname=? WHERE email=?");
        //     $statement->execute(array($lastname, $_SESSION['email']));
        //     $_SESSION['name'] = $lastname . ' ' . explode(' ', $_SESSION['name'])[1];
        //   }
        //   if(isset(request['address']) {
        //     $address = $user->getAddress();
        //     $statement = $pdo->prepare("UPDATE users SET address=? WHERE email=?");
        //     $statement->execute(array($address, $_SESSION['email']));
        //     $_SESSION['address'] = $address;
        //   }
        //   if(isset(request['']) {
        //     $phone = $user->getPhone();
        //     $statement = $pdo->prepare("UPDATE users SET phone=? WHERE email=?");
        //     $statement->execute(array($phone, $_SESSION['email']));
        //     $_SESSION['phone'] = $phone;
        //   }
    }


}

?>