<?php

namespace SeoBundle\Entity;

use Symfony\Component\HttpFoundation\File\UploadedFile;


/**
 * Media
 */
class Media
{

    private $tempName;


    private $file;

    /**
     * @param mixed $file
     */
    public function setFile(UploadedFile $file)
    {
        if($this->src != null)
        {
            $this->tempName = $this->src;

            $this->url=null;
            $this->alt=null;
        }

        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    public function preUpload()
    {
        if ($this->file === null){
            return ;
        }

        if($this->tempName != null)
        {
            unlink($this->getUploadDir() . $this->tempName);
        }

        $this->src = uniqid() . '.' . $this->file->guessExtension();
        $this->alt = $this->file->getClientOriginalName();
    }

    /**
     * @ORM\PostPersist
     */
    public function postUpload()
    {
        if ($this->file === null){
            return ;
        }
        $this->file->move($this->getUploadDir(), $this->src);
    }

    /**
     * @ORM\PreRemove
     */
    public function preRemove()
    {
        $this->tempName = $this->src;
    }

    /**
     * @ORM\PostRemove
     */
    public function remove()
    {
        unlink($this->getUploadDir() . $this->src);
    }

    private function getUploadDir()
    {
        return __DIR__ . '/../../../web/uploads/img/';
    }

    //Generated Code


    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $src;

    /**
     * @var string
     */
    private $alt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $article;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->article = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set src
     *
     * @param string $src
     *
     * @return Media
     */
    public function setSrc($src)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * Get src
     *
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Media
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Add article
     *
     * @param \SeoBundle\Entity\Media $article
     *
     * @return Media
     */
    public function addArticle(\SeoBundle\Entity\Media $article)
    {
        $this->article[] = $article;

        return $this;
    }

    /**
     * Remove article
     *
     * @param \SeoBundle\Entity\Media $article
     */
    public function removeArticle(\SeoBundle\Entity\Media $article)
    {
        $this->article->removeElement($article);
    }

    /**
     * Get article
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getArticle()
    {
        return $this->article;
    }
}
