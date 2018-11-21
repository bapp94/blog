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
     * Set title
     *
     * @param string $title
     *
     * @return Post
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set creationtimestamp
     *
     * @param \DateTime $creationtimestamp
     *
     * @return Post
     */
    public function setCreationtimestamp($creationtimestamp)
    {
        $this->creationtimestamp = $creationtimestamp;

        return $this;
    }

    /**
     * Get creationtimestamp
     *
     * @return \DateTime
     */
    public function getCreationtimestamp()
    {
        return $this->creationtimestamp;
    }

    /**
     * Set authorId
     *
     * @param integer $authorId
     *
     * @return Post
     */
    public function setAuthorId($authorId)
    {
        $this->authorId = $authorId;

        return $this;
    }

    /**
     * Get authorId
     *
     * @return integer
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

    /**
     * Set categorieId
     *
     * @param integer $categorieId
     *
     * @return Post
     */
    public function setCategorieId($categorieId)
    {
        $this->categorieId = $categorieId;

        return $this;
    }

    /**
     * Get categorieId
     *
     * @return integer
     */
    public function getCategorieId()
    {
        return $this->categorieId;
    }
}
