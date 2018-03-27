<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
* @ORM\Entity(repositoryClass="Receipt_ListRepository")
* @ORM\Table(name="Receipt_List")
*/
class Receipt_List
{
    /**jsonSerialize
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
     * @ORM\Column(name="File", type="string", length=255)
     * @var string
     */
    private $file;

    /**
     * Application constructor.
     * @param $name
     * @param $description
     * @param $file
     */
    public function Set_Data($name, $description, $file)
    {
        $this->name = $name;
        $this->description = $description;
        $this->file = $file;
    }

    public function jsonSerialize()
    {
        return [
            'ID' => $this->id,
            'Name' => $this->name,
            'Description' => $this->description,
            'File' => $this->file,
        ];
    }

    public function Get_Name(){
        return $this->name;
    }

    public function Get_Description(){
        return $this->description;
    }
    public function Get_File(){
        return $this->file;
    }
}