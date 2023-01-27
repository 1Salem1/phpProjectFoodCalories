<?

class Food {
    public $id;
    public $repas;
    public $kcal;
    public $user_id;

    public function __construct($repas, $kcal, $user_id) {
        $this->id = uniqid();
        $this->repas = $repas;
        $this->kcal = $kcal;
        $this->user_id = $user_id;
    }

    public function save() {
        $db = new Database();
        $sql = "INSERT INTO food VALUES (:id, :repas, :kcal, :user_id)";
        $sql = $db->prepare($sql);
        $sql->execute([
            'id' => $this->id,
            'repas' => $this->repas,
            'kcal' => $this->kcal,
            'user_id' => $this->user_id
        ]);
    }
}


?>