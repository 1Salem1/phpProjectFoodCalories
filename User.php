<?
require './utils/connexion.php';
require_once './utils/fonction.php';

class User {
    private $pdo;
    private $email;

    public function __construct($pdo) {
        $this->pdo = $pdo;
        $this->email = $_SESSION['email'];
    }

    public function getUserByEmail() {
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
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