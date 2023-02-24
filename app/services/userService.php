<?php
require __DIR__ . '/../repositories/userRepository.php';
require_once __DIR__ . '/../models/user.php';
class UserService{
    public function get_AllUsers():array{
        $repo = new UserRepository();
        return $repo->get_AllUsers();
    }

    public function get_AllRegularUsers():array{
        $repo = new UserRepository();
        return $repo->get_AllCustomers();
    }

    public function get_UserById($id):User{
        $repo = new UserRepository();
        return $repo->get_UserById($id);
    }

    public function get_UserByEmail($email):User {
        $repo = new UserRepository();
        return $repo->get_UserByEmail($email);
    }

    public function get_UserPrivilegeById($id){
        $repo = new UserRepository();
        return $repo->get_UserPrivilegeById($id);
    }

}