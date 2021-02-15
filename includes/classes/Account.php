<?php
class Account
{
    private $conn;
    private $errorArray = array();

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function register($fn, $un, $em, $pw, $ur)
    {
        $this->validateFirstName($fn);
        $this->validateUsername($un);
        $this->validateEmails($em);
        $this->validatePasswords($pw);
        $this->validatePasswords($ur);

        if (empty($this->errorArray)) {
            return $this->insertUserDetails($fn, $un, $em, $pw, $ur);
        }
        return false;
    }

    public function login($un, $pw)
    {
        $pw = hash("sha512", $pw);

        $query = $this->conn->prepare("SELECT * FROM users WHERE username=:un AND user_password=:pw");
        $query->bindValue(":un", $un);
        $query->bindValue(":pw", $pw);

        $query->execute();

        if ($query->rowCount() == 1) {
            return true;
        }

        array_push($this->errorArray, Constants::$loginFailed);
        return false;
    }

    private function insertUserDetails($fn, $un, $em, $pw, $ur)
    {
        $pw = hash("sha512", $pw);

        $query = $this->conn->prepare("INSERT INTO users (user_firstname, username, user_email, user_password, user_role) VALUES(:fn, :un, :em, :pw, :ur)");
        $query->bindValue(":fn", $fn);
        $query->bindValue(":un", $un);
        $query->bindValue(":em", $em);
        $query->bindValue(":pw", $pw);
        $query->bindValue(":ur", $ur);

        return $query->execute();
    }

    private function validateFirstName($fn)
    {
        if (strlen($fn) < 2 || strlen($fn) > 25) {
            array_push($this->errorArray, Constants::$firstNameCharacters);
        }
    }

    private function validateUsername($un)
    {
        if (strlen($un) < 2 || strlen($un) > 11) {
            array_push($this->errorArray, Constants::$usernameCharacters);
            return;
        }

        $query = $this->conn->prepare("SELECT * FROM users WHERE username=:un");
        $query->bindValue(":un", $un);
        $query->execute();
        if ($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$usernameTaken);
        }
    }

    private function validateEmails($em)
    {
        if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
            array_push($this->errorArray, Constants::$emailInvalid);
            return;
        }

        $query = $this->conn->prepare("SELECT * FROM users WHERE user_email=:em");
        $query->bindValue(":em", $em);
        $query->execute();
        if ($query->rowCount() != 0) {
            array_push($this->errorArray, Constants::$emailTaken);
        }
    }

    private function validatePasswords($pw)
    {
        if (strlen($pw) < 2 || strlen($pw) > 25) {
            array_push($this->errorArray, Constants::$passwordLength);
        }
    }

    public function getError($error)
    {
        if (in_array($error, $this->errorArray)) {
            return "<span class='errorMessage'>$error</span>";
        }
    }
}
