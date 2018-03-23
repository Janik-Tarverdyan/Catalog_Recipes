<?php

use Doctrine\ORM\Annotation as ORM;

/**
 * @ORM\Entity @ORM\Table(name="products")
 **/
class Recept_List
{
    /** @ORM\Id @ORM\Column(type="integer") @ORM\GeneratedValue **/
    protected $id;

    /** @ORM\Column(type="string") **/
    protected $name;
}