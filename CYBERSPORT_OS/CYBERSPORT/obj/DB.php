<?php

class DB
{
    private $address = '127.0.0.1';
    private $login = 'root';
    private $pass = '';
    private $db = 'cybersport';

    private $mysql;

    function __construct()
    {
        $this->mysql = new mysqli($this->address, $this->login, $this->pass, $this->db);

    }

    function selectAll($table)
    {
        $dbObj = $this->mysql->query('SELECT * FROM ' . $table);

        $result = [];
        while ($row = $dbObj->fetch_assoc()) {
            $result[] = $row;
        }

        return $result;
    }

    function insertUser($username, $userpassword)
    {
        $this->mysql->query("INSERT INTO `InsertUser` (`name`, `password`) VALUES ('$username','$userpassword')");
    }
    function fromUser($username, $userpassword)
    {
        $stmt = $this->mysql->prepare("SELECT * FROM `InsertUser` WHERE name=? AND password=?");
        $stmt->bind_param("ss", $username, $userpassword);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result -> num_rows > 0) {
            session_start();
            $_SESSION['login'] = $username;
            header("location: main.php");
            return true;
        }
        else {
            return false;
        }
    }


    function post($game_name, $date, $info)
    {
        $this->mysql->query("INSERT INTO `tournaments_requests` (`game_name`, `date`, `info`) VALUES ('$game_name', '$date', '$info')");
    }

    function delete()
    {
        // SQL-запрос для нахождения последнего ID
        $sql = "SELECT MAX(id) AS last_id FROM tournaments_requests";
        $result = $this->mysql->query($sql);

        if ($result->num_rows > 0) {
            // Получение последнего ID
            $row = $result->fetch_assoc();
            $last_id = $row['last_id'];

            // SQL-запрос для удаления записи с последним ID
            $sql_delete = "DELETE FROM tournaments_requests WHERE id = $last_id";
            $this->mysql->query($sql_delete);
        }

    }

    function addToTournaments()
    {
        $column_list = "tournaments.id, tournaments.url, tournaments.image, tournaments.game_name, tournaments.name, tournaments.image_game, tournaments.date, tournaments.organizator, tournaments.registr, tournaments.registr_date, tournaments.size_prize, tournaments.prize";
        $query = "
            INSERT INTO $this->db.tournaments_new
            SELECT DISTINCT $column_list
            FROM $this->db.tournaments 
            RIGHT JOIN $this->db.tournaments_new
            ON $this->db.tournaments.registr_date = 'Скоро появится...';
        ";

        $this->mysql->query($query);
    }

    function deleteFromTournaments($registr_date)
    {
        $registr_date = $this->mysql->real_escape_string($registr_date);
        $query = "DELETE FROM tournaments_new WHERE registr_date = '$registr_date'";
        $this->mysql->query($query);
    }

    function compare_dates($a, $b) {
        return $a['date'] <=> $b['date'];
    }

    function compare_dates_desc($a, $b) {
        return $b['date'] <=> $a['date'];
    }




}

$DB = new DB();
