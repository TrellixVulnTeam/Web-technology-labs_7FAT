<?php

namespace App\Repository;

use App\Entity\User;
use Core\SQLRepository;
use PDO;

class UserRepository extends SQLRepository
{
    public function findAll(): array
    {
        // TODO: Implement findAll() method.
    }

    public function find($id): object
    {
        // TODO: Implement find() method.
    }

    // let's imagine that login unique field, and I didn't forget to make it unique in table when created it!
    public function findByLogin($login) {
        $user = $this->PDO->prepare('SELECT * FROM user WHERE login = :login');

        $user->bindParam(':login', $login);
        $user->execute();

        $arr = $user->fetchAll(PDO::FETCH_ASSOC);

        $users = $this->makeUserFromArray($arr);
        if ($users != null) {
            return $users[0];
        }

        return null;
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function save($entity)
    {
        $this->addToQuery(['INSERT INTO user (login, password)
            VALUE (:login, :password)',
            $entity->getEntityInfo(), self::CREATE]);
    }

    private function makeUserFromArray($arr)
    {
        $userEntityArr = [];
        foreach ($arr as $user) {
            $userEntity = new User();

            $userEntity->setId($user['id']);
            $userEntity->setLogin($user['login']);
            $userEntity->setPassword($user['password']);

            $userEntityArr[] = $userEntity;
        }

        if (!empty($userEntityArr))
            return $userEntityArr;

        return null;
    }
}
