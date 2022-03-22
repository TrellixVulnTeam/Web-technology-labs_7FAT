<?php

namespace App\Entity;

use Core\Entity;

class DisciplineTest extends Entity
{
    private $id;
    private $name;
    private $firstAnswer;
    private $secondAnswer;
    private $thirdAnswer;

    public function __construct()
    {
        parent::__construct('discipline_test', [
            'id', 'name', 'first_answer', 'second_answer', 'third_answer'
        ]);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getFirstAnswer()
    {
        return $this->firstAnswer;
    }

    /**
     * @param mixed $firstAnswer
     */
    public function setFirstAnswer($firstAnswer): void
    {
        $this->firstAnswer = $firstAnswer;
    }

    /**
     * @return mixed
     */
    public function getSecondAnswer()
    {
        return $this->secondAnswer;
    }

    /**
     * @param mixed $secondAnswer
     */
    public function setSecondAnswer($secondAnswer): void
    {
        $this->secondAnswer = $secondAnswer;
    }

    /**
     * @return mixed
     */
    public function getThirdAnswer()
    {
        return $this->thirdAnswer;
    }

    /**
     * @param mixed $thirdAnswer
     */
    public function setThirdAnswer($thirdAnswer): void
    {
        $this->thirdAnswer = $thirdAnswer;
    }

    public function getEntityInfo()
    {
        return [
            'tableName' => 'discipline_test',
            'rows' => [
                $this->name,
                $this->firstAnswer,
                $this->secondAnswer,
                $this->thirdAnswer
            ],
            'rowsFull' => [
                'id' => $this->id,
                'name' => $this->name,
                'first_answer' => $this->firstAnswer,
                'second_answer' => $this->secondAnswer,
                'third_answer' => $this->thirdAnswer
            ]
        ];
    }
}
