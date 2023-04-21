<?php
require __DIR__ . '/../repositories/userRepository.php';
require_once __DIR__ . '/../models/user.php';
class UserService
{
    public function get_AllUsers(): array
    {
        $repo = new UserRepository();
        return $repo->get_AllUsers();
    }
    public function get_AllRegularUsers(): array
    {
        $repo = new UserRepository();
        return $repo->get_AllCustomers();
    }
    public function get_UserById($id): User
    {
        $repo = new UserRepository();
        return $repo->get_UserById($id);
    }
    public function get_UserByEmail($email): User
    {
        $repo = new UserRepository();
        return $repo->get_UserByEmail($email);
    }
    public function get_UserByUsername($username): User
    {
        $repo = new UserRepository();
        return $repo->get_UserByUsername($username);
    }
    public function insert_User(User $user)
    {
        $repo = new UserRepository();
        return $repo->insert_User($user);
    }

    public function insert_UserWithRole($user)
    {
        $repo = new UserRepository();
        return $repo->insert_UserWithRole($user);
    }
    public function verify_UserCredentials(string $email, string $passwd): bool
    {
        $repo = new UserRepository();
        return $repo->verify_UserCredentials($email, $passwd);
    }
    public function update_Password($user_id, $password)
    {
        $repo = new UserRepository();
        return $repo->update_Password($user_id, $password);
    }
    public function delete_UserById($id)
    {
        $repo = new UserRepository();
        $repo->delete_UserById($id);
    }
    public function edit_UserById($id, $username, $email, $role_id)
    {
        $repo = new UserRepository();
        return $repo->edit_UserById($id, $username, $email, $role_id);
    }

    public function update_UsernameAndEmail(int $user_id, string $username, string $email)
    {
        $repo = new UserRepository();
        return $repo->update_UsernameAndEmail($user_id, $username, $email);
    }
}
