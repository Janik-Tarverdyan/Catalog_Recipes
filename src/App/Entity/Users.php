<?php

namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Receipt_ListRepository")
 * @ORM\Table(name="Receipt_List")
 */
class Users implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(name="User_Name", type="string", length=32)
     * @var string
     */
    private $username;

    /**
     * @ORM\Column(name="eMail", type="string", length=255)
     * @var string
     */
    private $email;

    /**
     * @ORM\Column(name="Password", type="string", length=255)
     * @var string
     */
    private $password;

    /**
     * Application constructor.
     * @param $name
     */
    public function __construct($username, $email, $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function jsonSerialize()
    {
        return [
            'ID' => $this->id,
            'User_Name' => $this->username,
            'eMail' => $this->email,
            'Password' => $this->password,
        ];
    }
}