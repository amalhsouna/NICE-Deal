<?php

namespace Entity\EcommerceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partenary
 *
 * @ORM\Table(name="partenary")
 */
class Partenary
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255)
     */
    private $adresse;

    /**
     * @var int
     *
     * @ORM\Column(name="telephone", type="integer")
     */
    private $telephone;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="opiningTime", type="datetime")
     */
    private $opiningTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeTime", type="datetime")
     */
    private $closeTime;


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
     * Set name
     *
     * @param string $name
     * @return Partenary
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Partenary
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param integer $telephone
     * @return Partenary
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return integer 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set opiningTime
     *
     * @param \DateTime $opiningTime
     * @return Partenary
     */
    public function setOpiningTime($opiningTime)
    {
        $this->opiningTime = $opiningTime;

        return $this;
    }

    /**
     * Get opiningTime
     *
     * @return \DateTime 
     */
    public function getOpiningTime()
    {
        return $this->opiningTime;
    }

    /**
     * Set closeTime
     *
     * @param \DateTime $closeTime
     * @return Partenary
     */
    public function setCloseTime($closeTime)
    {
        $this->closeTime = $closeTime;

        return $this;
    }

    /**
     * Get closeTime
     *
     * @return \DateTime 
     */
    public function getCloseTime()
    {
        return $this->closeTime;
    }
}
