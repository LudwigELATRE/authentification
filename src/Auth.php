<?php

namespace App;

use PDO;
use App\User\User;

class Auth
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function user(): ?User
    {
    }

    public function login(string $username, string $password): ?User
    {
        // Trouve l'utilisateur correspondant au username
        $query = $this->pdo->prepare('SELECT * FROM users WHERE username = :username');
        $query->execute([
            'username' => $username,
        ]);
        $user = $query->fetchObject(User::class);
        if ($user === false) {
            return null;
        }
        //On verifie le password avec password_verify que l'utilisateur corresponds
        if (password_verify($password, $user->password)) {
            session_start();
            $_SESSION['auth'] = $user->id;
            return $user;
        }
        return null;
    }
}
