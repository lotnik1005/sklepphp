<?php
    require_once('DBConnect.php');

    /**
     * Class User
     * users login and register
     */
    class User extends DBConnect 
    {
        /**
         * @param $username
         * @param $password
         * @return bool
         * user login service
         */
        public function login($username, $password) {
            try {
                $sql = ("SELECT name FROM users WHERE (username=:username OR email=:username) AND password=:password");
                $query = $this->dbc->prepare($sql);
                $query->bindParam("username", $username, PDO::PARAM_STR);
                $enc_password = hash('sha256', $password);
                $query->bindParam("password", $enc_password, PDO::PARAM_STR);
                $query->execute();
                if($query->rowCount() > 0) {
                    $result = $query->fetch(PDO::FETCH_OBJ);
                    return $result->name;
                } else {
                    return false;
                }
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }

        /**
         * @param $name
         * @param $email
         * @param $username
         * @param $password
         * user register service
         */
        public function register($name, $email, $username, $password) {
            try {
                $sql = "INSERT INTO users(name, email, username, password) VALUES(:name, :username, :email, :password)";
                $query = $this->dbc->prepare($sql);
                $query->bindParam("name", $name, PDO::PARAM_STR);
                $query->bindParam("email", $email, PDO::PARAM_STR);
                $query->bindParam("username", $username, PDO::PARAM_STR);
                $enc_password = hash('sha256', $password);
                $query->bindParam("password", $enc_password, PDO::PARAM_STR);
                $query->execute();
                // return $this->dbc->lastInsertId();
            } catch (PDOException $e) {
                exit($e->getMessage());
            }
        }
    }

