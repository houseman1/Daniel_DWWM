<?php

class Database {
    private $dbHost = DB_HOST;
    private $dbUser = DB_USER;
    private $dbPass = DB_PASS;
    private $dbName = DB_NAME;

    private $statement;
    private $dbHandler;
    private $error;

    public function __construct() {
        $conn = 'mysql:host=' . $this->dbHost . ';dbname=' . $this->dbName;

        # Handle errors
        # Gérer les erreurs
        # PDO::ATTR_PERSISTENT => true,
        # Prevents the driver crashing and giving timeouts when trying to connect to the database
        # Empêche le pilote de planter et de donner des délais d'attente lors de la tentative
        # de connexion à la base de données
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );
        try {
            # Instantiate PDO class
            $this->dbHandler = new PDO($conn, $this->dbUser, $this->dbPass, $options);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    # Allows us to write queries
    # Nous permet d'écrire des requêtes
    public function query($sql) {
        $this->statement = $this->dbHandler->prepare($sql);
    }

    # Bind values
    public function bind($parameter, $value, $type = null)
    {
        switch (is_null($type)) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        $this->statement->bindValue($parameter, $value, $type);
    }

    # Execute the prepared statement
    # Exécuter la requête préparée
    public function execute() {
        return $this->statement->execute();
    }

    # Return an array (used with SELECT queries)
    # Retourne un tableau (utilisé avec les requêtes SELECT)
    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_OBJ);
    }

    # Return a specific row as an object
    # Renvoie une ligne spécifique en tant qu'objet
    public function single() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_OBJ);
    }

    # Get the row count (used with UPDATE queries)
    # Obtenir le nombre de lignes (utilisé avec les requêtes UPDATE)
    public function rowCount() {
        return $this->statement->rowCount();
    }
}

?>
