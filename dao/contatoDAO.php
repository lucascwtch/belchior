<?php
// EmailDAO.php
require("../controller/config.php");

class EmailDAO {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getEmails() {
        $query = "SELECT email FROM email";
        $result = $this->db->query($query);
        return $result->fetchAll(PDO::FETCH_COLUMN, 0);
    }
}
?>
