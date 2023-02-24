<?php
    class User implements JsonSerializable{
        private ?int $id;
        private ?string $username;
        private ?string $email;
        private ?string $passwd;


        function __construct()
        {
            $this->id = null;
            $this->username = null;
            $this->email = null;
            $this->passwd = null;
        }

        function __constructO($id, $username, $email, $passwd ){
            $this->id = $id;
            $this->username = $username;
            $this->email = $email;
            $this->passwd = $passwd;
        }

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

        public function get_passwd():string{
            return $this->passwd;
        }
        public function __set_passwd(string $passwd):self{
            $this->passwd = $passwd;
            return $this;
        }

        public function jsonSerialize(): mixed
        {
            return [
                'id' => $this->id,
                'username' => $this->username,
                'email' => $this->email,
                'password' => $this->passwd
            ];
        }
    }
?>