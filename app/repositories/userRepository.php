<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/user.php';
class UserRepository extends Repository
{
    public function get_AllUsers(){
        try {
            $stmt = $this->conn->prepare("SELECT id, username, email, password FROM users");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $users = $stmt->fetchAll();
            return $users;
        } catch (PDOException $e) {
            echo $e;
            }
         }
       public function get_AllCustomers(){
        try{
            $stmt = $this->conn->prepare("SELECT id, username, email, password FROM users customers WHERE users.id = customers.id");
            $stmt->execute();

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $customers = $stmt->fetchAll();
            return $customers;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function get_UserById(int $id): User{
        try {
            $stmt = $this->conn->prepare("SELECT id, username, email, password FROM User WHERE id = :uid");
            $stmt->execute(array(':uid' => $id));

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();
            return $user;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function get_UserByEmail(string $email): User{
        try {
            $stmt = $this->conn->prepare("SELECT id, username, email, password FROM users WHERE email = :email");
            $stmt->execute(array(':email' => $email));

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();
            return $user;
         }catch(PDOException $e){
            echo $e;
        }
    }

    public function get_UserPrivilegeById($id){
        try {
            //TODO
            $stmt = $this->conn->prepare("");
            $stmt->execute();

            // return 1 for admin, 0 for regular user
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function verify_UserCredentials(string $email, $passwd){
        try {
            $stmt = $this->conn->prepare("SELECT users.id FROM users, customer WHERE email = :email AND password = :passwd AND users.id = customer.id");
            $stmt->execute(array(':email' => htmlspecialchars($email), ':passwd' => htmlspecialchars($passwd)));
            return $stmt->rowCount() == 1 ? true : false;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    
    public function insert_User(User $user)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
            $stmt->execute(array(':username' => $user->get_username(), ':email' => $user->get_email(), ':password' => $user->get_password())); //how to select the values from the user object? //get_object_vars()?
        } catch (PDOException $e) {
            echo $e;
        }
    }
}

?>