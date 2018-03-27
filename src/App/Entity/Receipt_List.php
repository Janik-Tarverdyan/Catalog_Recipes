<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass="Receipt_ListRepository")
* @ORM\Table(name="Receipt_List")
*/
class Receipt_List implements \JsonSerializable
{
//    /**
//    * @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue
//    * @var int
//    */
//    protected $id;
//
//    /**
//    * @ORM\Column(type="string")
//    * @var string
//    */
//    protected $name;
//    /**
//    * @ORM\Column(type="string")
//    * @var string
//    */
//    protected $description;
//    /**
//    * @ORM\Column(type="string")
//    * @var string
//    */
//    protected $file;
//
//    /**
//    * @ORM\Column(type="datetime")
//    * @var DateTime
//    */
//    protected $created;
//
//    /**
//    * @ORM\Column(type="string")
//    * @var string
//    */
//    protected $status;



    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="Name", type="string", length=32)
     * @var string
     */
    private $name;

    /**
     * @ORM\Column(name="Description", type="string", length=255)
     * @var string
     */
    private $description;

    /**
     * Application constructor.
     * @param $name
     */
    public function __construct($name, $description)
    {
        $this->name = $name;
        $this->description = $description;
    }

    public function jsonSerialize()
    {
        return [
            'ID' => $this->id,
            'Name' => $this->name,
            'Description' => $this->description,
        ];
    }














//
//    public function getId()
//    {
//        return $this->id;
//    }
//    public function getName()
//    {
//        return $this->name;
//    }
//    public function getDescription()
//    {
//        return $this->description;
//    }
//    public function getFile()
//    {
//        return $this->file;
//    }
//    public function getCreated()
//    {
//        return $this->created;
//    }
//    public function getStatus()
//    {
//        return $this->status;
//    }
//
//
//    public function setName($name)
//    {
//        $this->description = $name;
//    }
//    public function setDescription($description)
//    {
//        $this->description = $description;
//    }
//    public function setFile($file)
//    {
//        $this->description = $file;
//    }
//    public function setCreated(DateTime $created)
//    {
//        $this->created = $created;
//    }
//    public function setStatus($status)
//    {
//        $this->status = $status;
//    }
}