<?php

use Doctrine\ORM\Annotation as ORM;

/**
* @ORM\Entity(repositoryClass="Recept_ListRepository")
* @ORM\Table(name="Recept_List")
*/
class Recept_List
{
    /**
    * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
    * @var int
    */
    protected $id;

    /**
    * @ORM\Column(type="string")
    * @var string
    */
    protected $name;
    /**
    * @ORM\Column(type="string")
    * @var string
    */
    protected $description;
    /**
    * @ORM\Column(type="string")
    * @var string
    */
    protected $file;

    /**
    * @ORM\Column(type="datetime")
    * @var DateTime
    */
    protected $created;

    /**
    * @ORM\Column(type="string")
    * @var string
    */
    protected $status;


    public function getId()
    {
        return $this->id;
    }
    public function getName()
    {
        return $this->name;
    }
    public function getDescription()
    {
        return $this->description;
    }
    public function getFile()
    {
        return $this->file;
    }
    public function getCreated()
    {
        return $this->created;
    }
    public function getStatus()
    {
        return $this->status;
    }


    public function setName($name)
    {
        $this->description = $name;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }
    public function setFile($file)
    {
        $this->description = $file;
    }
    public function setCreated(DateTime $created)
    {
        $this->created = $created;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }
}