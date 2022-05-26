<?php

namespace App\Entity;

use Core\Entity;

class UserData extends Entity
{
    private int $id;
    private $visitDate;
    private string $ipAddress;
    private string $hostname;
    private string $browserName;
    private string $webpageAddress;

    public function __construct()
    {
        parent::__construct('user_data', [
            null
        ]);
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        if (isset($this->id))
            return $this->id;

        return null;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getVisitDate()
    {
        return $this->visitDate;
    }

    public function setVisitDate($visitDate): void
    {
        $this->visitDate = $visitDate;
    }

    /**
     * @return string
     */
    public function getIpAddress(): string
    {
        return $this->ipAddress;
    }

    /**
     * @param string $ipAddress
     */
    public function setIpAddress(string $ipAddress): void
    {
        $this->ipAddress = $ipAddress;
    }

    /**
     * @return string
     */
    public function getHostname(): string
    {
        return $this->hostname;
    }

    /**
     * @param string $hostname
     */
    public function setHostname(string $hostname): void
    {
        $this->hostname = $hostname;
    }

    /**
     * @return string
     */
    public function getBrowserName(): string
    {
        return $this->browserName;
    }

    /**
     * @param string $browserName
     */
    public function setBrowserName(string $browserName): void
    {
        $this->browserName = $browserName;
    }

    /**
     * @return string
     */
    public function getWebpageAddress(): string
    {
        return $this->webpageAddress;
    }

    /**
     * @param string $webpageAddress
     */
    public function setWebpageAddress(string $webpageAddress): void
    {
        $this->webpageAddress = $webpageAddress;
    }



    public function getEntityInfo()
    {
        return [
            'table_name' => 'user_data',
            'rowsFull' => [
                'id' => $this->getId(),
                'visit_date' => $this->visitDate,
                'ip_address' => $this->ipAddress,
                'host_name' => $this->hostname,
                'browser_name' => $this->browserName,
                'webpage_address' => $this->webpageAddress
            ]
        ];
    }

}
