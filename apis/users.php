<?php

require "{$_SERVER['DOCUMENT_ROOT']}/bootstrap.php";
try {
    $dbUsers = $dbh->getAllUsers()->fetch_all(MYSQLI_ASSOC);
    echo json_encode([
        "success" => true,
        "data" => json_encode($dbUsers),
    ]);
} catch (Exception $ex) {
    echo json_encode([
        "success" => false,
        "data" => $res
    ]);
}

class User {
    public $username;
    public $role;
    public $isActive;
    public $email;
    public $name;
    public $surname;
    public $birthDate;
    public $enrollmentDate;
    public $accountCode;
    public $enrollmentNumber;
    public $isFullProfessor;

    public function __construct(
        $username,
        $roleCode,
        $isActive,
        $email
    ) {
        $this->username = $username;
        $this->role = $roleCode;
        $this->isActive = $isActive;
        $this->email = $email;
    }

    public static function builder() {
        return new UserBuilder();
    }
}

class UserBuilder {
    private $user;

    public function __construct() {
        $this->user = new User('', '', '', '');
    }

    public function setUsername($username) {
        $this->user->username = $username;
        return $this;
    }

    public function setRole($role) {
        $this->user->role = $role;
        return $this;
    }

    public function setIsActive($isActive) {
        $this->user->isActive = $isActive;
        return $this;
    }

    public function setEmail($email) {
        $this->user->email = $email;
        return $this;
    }

    public function setName($name) {
        $this->user->name = $name;
        return $this;
    }

    public function setSurname($surname) {
        $this->user->surname = $surname;
        return $this;
    }

    public function setBirthDate($birthDate) {
        $this->user->birthDate = $birthDate;
        return $this;
    }

    public function setEnrollmentDate($enrollmentDate) {
        $this->user->enrollmentDate = $enrollmentDate;
        return $this;
    }

    public function setAccountCode($accountCode) {
        $this->user->accountCode = $accountCode;
        return $this;
    }

    public function setEnrollmentNumber($enrollmentNumber) {
        $this->user->enrollmentNumber = $enrollmentNumber;
        return $this;
    }

    public function setIsFullProfessor($isFullProfessor) {
        $this->user->isFullProfessor = $isFullProfessor;
        return $this;
    }

    public function build() {
        return $this->user;
    }
}