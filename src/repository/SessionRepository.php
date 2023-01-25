<?php

require_once 'Repository.php';

class SessionRepository extends Repository
{
    public function createUserSession(int $id_user)
    {
        $token = hash('sha256', bin2hex(openssl_random_pseudo_bytes(64)));
        $expire_time = time() + 86400;
        $expire_date = date('Y-m-d H:i:s', $expire_time);

        $stmt = $this->database->connect()->prepare('
                SELECT * FROM session WHERE id_user = :id_user AND expire >= now();
        ');
        $stmt->bindParam(':id_user', $id_user);
        $stmt->execute();


        if ($stmt->rowCount() <= 0) {
            $inert = $this->database->connect()->prepare('
            INSERT INTO session (id_user, token, expire)
            VALUES (?, ?, ?)
            ON DUPLICATE KEY UPDATE token = token, expire = expire;
        ');

        $inert->execute([
            $id_user,
            $token,
            $expire_date
        ]);

        }
        else{
            $sql = "UPDATE session SET expire=?, token = ? WHERE id_user=?";
            $stmt= $this->database->connect()->prepare($sql);
            $stmt->execute([$expire_date, $token, $id_user]);           
        }

        setcookie("session_token", $token, $expire_time);
    }

    public function endUserSession()
    {
        if (isset($_COOKIE['session_token'])) {
            $stmt = $this->database->connect()->prepare('
            DELETE FROM session WHERE token = :token;
        ');
            $stmt->bindParam(':token', $_COOKIE['session_token']);
            $stmt->execute();

            setcookie('session_token', '', time() - 3600);
        }
    }

    /**
     * @throws Exception
     */
    public function getUserId(): ?int
    {
        $stmt = $this->database->connect()->prepare('
                SELECT id_user FROM session WHERE token = :token AND expire >= now();
        ');
        $stmt->bindParam(':token', $_COOKIE["session_token"]);
        $stmt->execute();

        $id_user = $stmt->fetchColumn();

        if (!$id_user) {
            throw new Exception("Invalid token");
        }

        return $id_user;
    }
}
