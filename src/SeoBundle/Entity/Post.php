<?php

namespace SeoBundle\Entity;

/**
 * Post
 */
class Post
{
/* Fonction pour Date Auto au jour*/
   /* public function __construct()
    {
        $this->date = new \DateTime('now');
    }

    //generate code*/


    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $titre;

    /**
     * @var \DateTime
     */
    private $date;

    /**
     * @var string
     */
    private $contenu;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Post
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Post
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     *
     * @return Post
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    private $medias;


    /**
     * Set medias
     *
     * @param \SeoBundle\Entity\Media $medias
     *
     * @return Post
     */
    public function setMedias(\SeoBundle\Entity\Media $medias = null)
    {
        $this->medias = $medias;

        return $this;
    }

    /**
     * Get medias
     *
     * @return \SeoBundle\Entity\Media
     */
    public function getMedias()
    {
        return $this->medias;
    }
}
