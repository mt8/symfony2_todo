<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * task
 *
 * @ORM\Table(name="task")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\taskRepository")
 */
class task
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="limit_date", type="datetime")
     */
    private $limitDate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=1)
     */
    private $status;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return task
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set limitDate
     *
     * @param \DateTime $limitDate
     * @return task
     */
    public function setLimitDate($limitDate)
    {
        $this->limitDate = $limitDate;

        return $this;
    }

    /**
     * Get limitDate
     *
     * @return \DateTime 
     */
    public function getLimitDate()
    {
        return $this->limitDate;
    }

    /**
     * Set status
     *
     * @param string $status
     * @return task
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string 
     */
    public function getStatus()
    {
        return $this->status;
    }
}
