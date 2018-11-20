<?php

namespace Blog\BlogBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="Post")
 * @ORM\Entity
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="Title", type="string", length=30, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="Content", type="text", length=65535, nullable=false)
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="CreationTimesTamp", type="datetime", nullable=false)
     */
    private $creationtimestamp;

    /**
     * @var integer
     *
     * @ORM\Column(name="Author_id", type="integer", nullable=false)
     */
    private $authorId;

    /**
     * @var integer
     *
     * @ORM\Column(name="Categorie_id", type="integer", nullable=false)
     */
    private $categorieId;


}

