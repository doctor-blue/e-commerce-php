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