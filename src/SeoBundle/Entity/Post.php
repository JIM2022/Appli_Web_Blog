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
    /**
     * @var string
     */
    private $sous_titre_1;

    /**
     * @var string
     */
    private $contenu_1;

    /**
     * @var string
     */
    private $sous_titre_2;

    /**
     * @var string
     */
    private $contenu_2;


    /**
     * Set sousTitre1
     *
     * @param string $sousTitre1
     *
     * @return Post
     */
    public function setSousTitre1($sousTitre1)
    {
        $this->sous_titre_1 = $sousTitre1;

        return $this;
    }

    /**
     * Get sousTitre1
     *
     * @return string
     */
    public function getSousTitre1()
    {
        return $this->sous_titre_1;
    }

    /**
     * Set contenu1
     *
     * @param string $contenu1
     *
     * @return Post
     */
    public function setContenu1($contenu1)
    {
        $this->contenu_1 = $contenu1;

        return $this;
    }

    /**
     * Get contenu1
     *
     * @return string
     */
    public function getContenu1()
    {
        return $this->contenu_1;
    }

    /**
     * Set sousTitre2
     *
     * @param string $sousTitre2
     *
     * @return Post
     */
    public function setSousTitre2($sousTitre2)
    {
        $this->sous_titre_2 = $sousTitre2;

        return $this;
    }

    /**
     * Get sousTitre2
     *
     * @return string
     */
    public function getSousTitre2()
    {
        return $this->sous_titre_2;
    }

    /**
     * Set contenu2
     *
     * @param string $contenu2
     *
     * @return Post
     */
    public function setContenu2($contenu2)
    {
        $this->contenu_2 = $contenu2;

        return $this;
    }

    /**
     * Get contenu2
     *
     * @return string
     */
    public function getContenu2()
    {
        return $this->contenu_2;
    }
}
