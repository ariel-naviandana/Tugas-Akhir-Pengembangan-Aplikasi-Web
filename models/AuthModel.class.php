<?php
class AuthModel extends Model
{
    public function insert($username, $email, $password)
    {
        $stmt = $this->mysqli->prepare(
            "INSERT INTO users (username, email, password) 
             VALUES (?, ?, ?)"
        );

        $stmt->bind_param(
            "sss",
            $username,
            $email,
            $password,
        );

        $stmt->execute();
    }

    public function getByEmail($email)
    {
        $stmt = $this->mysqli->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result();
    }
}
