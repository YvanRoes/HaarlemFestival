<?php
require_once __DIR__ . '/repository.php';
require_once __DIR__ . '/../models/user.php';
class UserRepository extends Repository
{
    public function get_AllUsers(){
        try {
            $stmt = $this->conn->prepare("SELECT id, username, email, password, role FROM users");
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
            $stmt = $this->conn->prepare("SELECT id, username, email, password, role FROM users WHERE email = :email");
            $stmt->execute(array(':email' => $email));

            $stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
            $user = $stmt->fetch();
            return $user;
         }catch(PDOException $e){
            echo $e;
        }
    }

    public function get_UserByUsername(string $username): User{
        try {
            $stmt = $this->conn->prepare("SELECT id, username, email, password FROM users WHERE username = :username");
            $stmt->execute(array(':username' => $username));

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
            $stmt = $this->conn->prepare("SELECT users.id FROM users WHERE email = :email AND password = :passwd");
            $stmt->execute(array(':email' => htmlspecialchars($email), ':passwd' => htmlspecialchars($passwd)));
            return $stmt->rowCount() == 1 ? true : false;
        } catch (PDOException $e) {
            echo $e;
        }
    }

    
    public function insert_User(User $user)
    {
        try {
            $stmt = $this->conn->prepare("INSERT INTO users (username, email, password, role) VALUES (:username, :email, :password, 0)");
            $stmt->execute(array(':username' => $user->get_username(), ':email' => $user->get_email(), ':password' => md5($user->get_password())));
        } catch (PDOException $e) {
            echo $e;
        }
    }
    
    public function update_Password(int $user_id, string $password)
    {
        try {
            $stmt = $this->conn->prepare("UPDATE users SET password = :password WHERE id = :id");
            $stmt->execute(array(':password' => md5($password), ':id' => $user_id));
        } catch (PDOException $e) {
            echo $e;
        }
    }
    public function delete_UserById($id){
        try {
            $stmt = $this->conn->prepare("DELETE FROM users WHERE id = :id");
            $stmt->execute(array(':id' => $id));
        } catch (PDOException $e) {
            echo $e;
        }
    }

    public function edit_UserById($id, $username, $email){
        try{
            $stmt = $this->conn->prepare("UPDATE users SET username = '[:username]', email = '[':email]' WHERE id = :id");
            $stmt->execute(array(':id' => $id, ':username' => $username, ':email' => $email));
        }catch(PDOException $e){
            echo $e;
        }
    }
}
