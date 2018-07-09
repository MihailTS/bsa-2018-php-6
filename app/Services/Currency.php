<?php

namespace App\Services;

class Currency
{

    private $id;
    private $name;
    private $shortName;
    private $actualCourse;
    private $actualCourseDate;
    private $isActive;

    /**
     * Currency constructor.
     * @param int $id
     * @param string $name
     * @param string $shortName
     * @param float $actualCourse
     * @param \DateTime $actualCourseDate
     * @param bool $isActive
     */
    public function __construct(int $id, string $name, string $shortName,
                                float $actualCourse, \DateTime $actualCourseDate, bool $isActive)
    {
        $this->id = $id;
        $this->name = $name;
        $this->shortName = $shortName;
        $this->actualCourse = $actualCourse;
        $this->actualCourseDate = $actualCourseDate;
        $this->isActive = $isActive;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @return float
     */
    public function getActualCourse(): float
    {
        return $this->actualCourse;
    }

    /**
     * @return \DateTime
     */
    public function getActualCourseDate(): \DateTime
    {
        return $this->actualCourseDate;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->isActive;
    }


    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function setShortName(string $shortName)
    {
        $this->shortName = $shortName;
    }

    public function setActualCourse(float $actualCourse)
    {
        $this->actualCourse = $actualCourse;
    }

    public function setActualCourseDate(\DateTime $actualCourseDate)
    {
        $this->actualCourseDate = $actualCourseDate;
    }

    public function setIsActive(bool $isActive)
    {
        $this->isActive = $isActive;
    }
}
