<?php
    class User implements JsonSerializable{
        private ?int $id = null;
        private ?string $username = null;
        private ?string $email = null;
        private ?string $password = null;
        private ?int $role = null;

        public function get_uid(): int{
            return $this->id;
        }
        public function __set_uid(int $id):self{
            $this->id  = $id;
            return $this;
        }

        public function get_username():string{
            return $this->username;
        }
        public function __set_username(string $username):self{
            $this->username = $username;
            return $this;
        }

        public function get_email():string{
            return $this->email;
        }
        public function __set_email(string $email):self{
            $this->email = $email;
            return $this;
        }

        public function get_password():string{
            return $this->password;
        }
        public function __set_password(string $password):self{
            $this->password = $password;
            return $this;
        }

        public function get_role():int{
            return $this->role;
        }
        public function __set_role(int $role){
            $this->role = $role;
            return $this;
        }

        public function jsonSerialize(): mixed{
            return [
                'id' => $this->id,
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->password,
                'role' => $this->role,
            ];
        }
    }
?>