<?
require './utils/connexion.php';
require_once './utils/fonction.php';

class User {
    private $pdo;
    private $email;

    private $data;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->email = $_SESSION['email'];
        $this->data = $_SESSION['user'];
    }

    public function getUserByEmail() {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getUserDataByEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $_SESSION['user'] = $stmt->fetch();
        return $stmt->fetch();
    }



    public function isAdmin() {
        $user = $this->getUserByEmail();
        return $user['isAdmin'] == 1;
    }

    public function logout() {
        unset($_SESSION);
        header("Location: login.php");
        exit;
    }
}



?>