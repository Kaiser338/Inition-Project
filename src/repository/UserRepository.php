<?php

require_once 'Repository.php';
require_once __DIR__ . '/../models/User.php';

class UserRepository extends Repository
{

    public function userExists(string $value): bool
    {
        try {
            $user = $this->getUser($value);
        } catch (Exception $exception) {
            return false;
        }

        return boolval($user);
    }

    /**
     * @throws Exception
     */
    public function getUser(string $value): ?User
    {
        $query = 'SELECT * FROM users WHERE email = :value';
        $stmt = $this->database->connect()->prepare($query);
        $stmt->bindParam(':value', $value);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            throw new Exception("User not found");
        }

        return new User(
            $user['id'],
            $user['username'],
            $user['email'],
            $user['password'],
        );
    }

    public function addUser(User $user)
    {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (username, email, password)
            VALUES (?, ?, ?)
        ');

        $stmt->execute([
            $user->getUsername(),
            $user->getEmail(),
            $user->getPassword()
        ]);
    }



}
