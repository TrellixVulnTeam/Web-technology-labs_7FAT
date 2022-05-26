<?php

namespace App\Repository;

use App\Entity\UserData;
use Core\Repository;
use Core\SQLRepository;

class UserDataRepository extends SQLRepository
{

    public function findAll(): array
    {
        $userData = $this->PDO->query('SELECT * FROM user_data ORDER BY visit_date DESC')->fetchAll();
        return $this->makeDataFromArray($userData);
    }

    public function find($id): object
    {
        // TODO: Implement find() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function save($entity)
    {
        $this->addToQuery(['INSERT INTO user_data (visit_date, ip_address, host_name, browser_name, webpage_address)
            VALUE (:visit_date, :ip_address, :host_name, :browser_name, :webpage_address)',
            $entity->getEntityInfo(), self::CREATE]);
    }

    private function makeDataFromArray($arr) {
        $dataArr = [];

        foreach ($arr as $arrData) {
            $data = new UserData();

            $data->setId($arrData['id']);
            $data->setVisitDate($arrData['visit_date']);
            $data->setIpAddress($arrData['ip_address']);
            $data->setHostname($arrData['host_name']);
            $data->setBrowserName($arrData['browser_name']);
            $data->setWebpageAddress($arrData['webpage_address']);

            $dataArr[] = $data;
        }

        return $dataArr;
    }
}
