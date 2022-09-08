<?php
require("database.php");

abstract class Model
{
    private $pdo;
    protected $table;

    public function __construct()
    {
        $this->pdo = getPDO();
    }
    /**
     * this function return all games in array
     * 
     * @return array 
    */
    function getAll($order=""): array
    {
        $sql = "SELECT * FROM {$this->table}";
        if($order){
            $sql .= " Order BY ".$order;
        }
        $query = $this->pdo->prepare($sql);
        $query->execute();
        $items = $query->fetchAll();

        return $items ;
    }

    /**
     * This function return current id of item
     * @return int
    */
    function getID(): int
    {
        if (!empty($_GET['id']) && is_numeric($_GET['id'])) {
            $id = clear_xss($_GET['id']);
        } else {
            $_SESSION["error"] = "URL invalide";
            header("location: index.php");
        }
        return $id;
    }

    /**
     * This function return a single game
     * @return array 
    */
    function get(): array
    {
        $id = $this->getID();
        $sql = "SELECT * FROM {$this->table} WHERE id=:id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $item = $query->fetch();

        if (!$item) {
            $_SESSION["error"] = "Ce jeu n'est pas disponible.";
            header("location: index.php");
        }
        return $item ;
    }
    /**
     * This function delete an item
     * @return void 
     */
    function delete(): void
    {
        $id = $this->getID();
        $sql = "DELETE FROM {$this->table} WHERE id=?";
        $query = $this->pdo->prepare($sql);
        $query->execute([$id]);
        //Redirect
        $_SESSION["success"] = "Le jeu est bien supprimé.";
        header("location:index.php");
    }

    /**
     * This function create an item
     * 
     * @param array $error
     * @return void 
     */
    function create($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img): void
    {
        $sql = "INSERT INTO {$this->table}(name, price, genre, note, plateforms, description, PEGI, created_at, url_img) VALUES(:name, :price, :genre, :note, :plateforms, :description, :PEGI, NOW(), :url_img)";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':price', $price, PDO::PARAM_STMT);
        $query->bindValue(':note', $note, PDO::PARAM_STMT);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':genre', implode("|", $genre_clear), PDO::PARAM_STR);
        $query->bindValue(':plateforms', implode("|", $plateforms_clear), PDO::PARAM_STR);
        $query->bindValue(':PEGI', $PEGI, PDO::PARAM_STR);
        $query->bindValue(':url_img', $url_img, PDO::PARAM_STR);
        $query->execute();

        // Redirect
        $_SESSION["success"] = "Le jeu a bien été ajouté";
        header("Location: index.php");
        die;
        
    }

    function update($name, $price, $note, $description, $genre_clear, $plateforms_clear, $PEGI, $url_img): void
    {   
        $id = $this->getID();
        $sql = "UPDATE {$this->table} SET name = :name, price = :price, genre = :genre, note = :note, plateforms = :plateforms, description = :description, PEGI = :PEGI, url_img = :url_img, updated_at = NOW() WHERE id= :id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->bindValue(':name', $name, PDO::PARAM_STR);
        $query->bindValue(':price', $price, PDO::PARAM_STMT);
        $query->bindValue(':note', $note, PDO::PARAM_STMT);
        $query->bindValue(':description', $description, PDO::PARAM_STR);
        $query->bindValue(':genre', implode("|", $genre_clear), PDO::PARAM_STR);
        $query->bindValue(':plateforms', implode("|", $plateforms_clear), PDO::PARAM_STR);
        $query->bindValue(':PEGI', $PEGI, PDO::PARAM_STR);
        $query->bindValue(':url_img', $url_img, PDO::PARAM_STR);

        $query->execute();

        $_SESSION["success"] = "Le jeu a bien été modifié";
        header("Location: index.php");
    }
}