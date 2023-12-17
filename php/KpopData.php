<?php

class KpopData
{
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function insertData($name, $dob, $about, $genre, $band, $photo, $status, $user_agent, $ip_address)
    {
        $sql = "INSERT INTO kpop_data (name, dob, about, genre, band, photo, status, user_agent, ip_address)
                VALUES ('$name', '$dob', '$about', '$genre', '$band', '$photo', '$status', '$user_agent', '$ip_address')";

        if ($this->conn->query($sql) === TRUE) {
            return "Data berhasil ditambahkan ke basis data.";
        } else {
            return "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function deleteData($id)
    {
        $sql = "DELETE FROM kpop_data WHERE id = $id";

        if ($this->conn->query($sql) === TRUE) {
            return "Data deleted successfully";
        } else {
            return "Error deleting data: " . $this->conn->error;
        }
    }

}
