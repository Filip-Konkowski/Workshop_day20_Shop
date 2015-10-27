<?php
/*
CREATE TABLE users(
        user_id INT AUTO_INCREMENT,
        user_name VARCHAR(30),
        user_surname VARCHAR(30),
        user_email VARCHAR(30) UNIQUE,
        user_password VARCHAR(60),
        user_address VARCHAR(60),
        PRIMARY KEY(user_id)
        );
 */


class User{

        static private $conn;
        public $id;
        public $name;
        public $surname;
        public $mail;
        public $password;
        public $address;


        static public function setConnection (mysqli $newConnection) {
                self::$conn = $newConnection;
        }

        static public function register($name, $surname, $newMail, $password, $password2, $address){
                if($password != $password2){
                        return false;
                }
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $sql = "INSERT INTO users(user_name, user_surname, user_email, user_password, user_address) VALUES ('$name', '$surname', '$newMail', '$hashedPassword','$address')";
                $result = self::$conn->query($sql);
                if($result == true){
                        $newUser = new User(self::$conn->insert_id, $name, $surname, $newMail, $address);
                        return $newUser;
                }
                return false;
        }

        static public function login($email, $password){
                $sql = "SELECT * FROM users WHERE user_email='$email'";
                $result = self::$conn->query($sql);

                if($result == true){
                        if($result->num_rows == 1){
                                $row = $result->fetch_assoc();
                                if(password_verify($password, $row["user_password"])){
                                        $loggedUser = new User($row['user_id'], $row['user_name'], $row['user_surname'], $row['user_mail'], $row['user_address']);
                                        return $loggedUser;
                                }
                        }
                }
                return false;
        }

        public function __construct($newId, $newName, $newSurname, $newEmail, $newAddress)
        {
                $this->id = $newId;
                $this->setName($newName);
                $this->setSurname($newSurname);
                $this->setEmail($newEmail);
                $this->setAddress($newAddress);
        }
        public function getId(){
                return $this->id;
        }

        public function getName()
        {
                return $this->name;
        }

        public function setName($name)
        {
                $this->name = $name;
        }

        public function getSurname()
        {
                return $this->surname;
        }

        public function setSurname($surname)
        {
                $this->surname = $surname;
        }

        public function getEmail()
        {
                return $this->mail;
        }

        public function setEmail($mail)
        {
                $this->mail = $mail;
        }

        public function getPassword()
        {
                return $this->password;
        }

        public function getAddress()
        {
                return $this->address;
        }

        public function setAddress($address)
        {
                $this->address = $address;
        }

}

