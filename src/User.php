<?php
/*
CREATE TABLE users(
        user_id INT AUTO_INCREMENT,
        user_name VARCHAR(30),
        user_surname VARCHAR(30),
        user_email VARCHAR(30),
        user_password VARCHAR(60),
        user_address VARCHAR(60),
        PRIMARY KEY(user_id)
 */

class User{
        static private $db;

        protected $name;
        protected $surname;
        protected $mail;
        protected $password;
        protected $address;


        public static function setConnection(mysqli $newConn){
                self:: $db = $newConn;
        }

        static public function register($name, $surname, $newMail, $password, $password2, $address){
                if($password != $password2){
                        return false;
                }
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

                $sql = "INSERT INTO users(user_name, user_surname, user_mail, user_password, user_address)
                VALUES ('$name', '$surname', '$newMail', '$hashedPassword','$address')";

                $result = self::$db->query($sql);
                if($result == true){
                        $newUser = new User(self::$db->insert_id, $name, $surname, $newMail, $address);
                        return $newUser;
                }

        }

        static public function logIn($mail, $password){
                $sql = "SELECT * FROM users WHERE user_mail = '$mail'";
                $result = self::$db->query($sql);

                if($result == true){
                        if($result->num_rows ==1){
                                $row = $result->fetch_assoc();
                                //var_dump($row);
                                //echo self::$conn->error;
                                if(password_verify($password, $row["user_password"])){
                                        //var_dump($row);
                                        $loggedUser = new User($row['user_id'], $row['user_name'], $row['user_surname'], $row['user_mail'], $row['user_address']);
                                        return $loggedUser;
                                }

                        }
                }
                return false;
        }

}