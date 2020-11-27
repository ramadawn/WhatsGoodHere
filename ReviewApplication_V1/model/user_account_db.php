<?php
class UserDB{
    
public function getAccountsByEmail($email_address) {
        $db = Database::getDB();

        $query = "SELECT * FROM user_account
                  WHERE emailAddress = '$email_address'";
        $result = $db->query($query);
        $row = $result->fetch();
        
            $user = new User_Account();
            $user->setID($row['userID']);
            $user->setEmail($row['emailAddress']);
            $user->setPassworda($row['password']);
            $user->setFirstName($row['firstName']);
            $user->setLastName($row['lastName']);

        
        return $user;
    }    
public function getUserAccountById($user_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM user_account
                  WHERE userID = '$user_id'";
        $result = $db->query($query);
        $row = $result->fetch();

        $user = new User_Account();
        $user->setID($row['userID']);
        $user->setEmail($row['emailAddress']);
        $user->setPassword($row['password']);
        $user->setFirstName($row['firstName']);
        $user->setLastName($row['lastName']);

        return $user;
    }
public function deleteUserAccount($user_id) {
        $db = Database::getDB();
        $query = "DELETE FROM user_account
                  WHERE userID = '$user_id'";
        $row_count = $db->exec($query);
        return $row_count;
    }
    
public function deleteUserAccountByEmail($email_address) {
        $db = Database::getDB();
        $query = "DELETE FROM user_account
                  WHERE emailAddress = '$email_address'";
        $row_count = $db->exec($query);
        return $row_count;
    }
public function addUserAccount($user) {
        $db = Database::getDB();

        $email = $user->getEmail();
        $password = $user->getPassword();
        $firstName = $user->getFirstName();
        $lastName = $user->getLastName();

        $query =
            "INSERT INTO user_account
                 (emailAddress, password, firstName, lastName)
             VALUES
                 ('$email', '$password', '$firstName', '$lastName')";

        $row_count = $db->exec($query);
        return $row_count;
    }
}


?>

