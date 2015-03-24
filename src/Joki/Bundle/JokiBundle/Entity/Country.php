<?php

namespace Joki\Bundle\JokiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Country
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Joki\Bundle\JokiBundle\Entity\CountryRepository")
 */
class Country
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="VAT", type="string", length=255)
     */
    private $vAT;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="OrderN", mappedBy="country")
     */
    protected $orders;


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
     * Set vAT
     *
     * @param string $vAT
     * @return Country
     */
    public function setVAT($vAT)
    {
        $this->vAT = $vAT;

        return $this;
    }

    /**
     * Get vAT
     *
     * @return string 
     */
    public function getVAT()
    {
        return $this->vAT;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Country
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
     *
     */
    public function __construct()
    {
        $this->orders = new ArrayCollection();
    }


    /**
     * Add orders
     *
     * @param \Joki\Bundle\JokiBundle\Entity\OrderN $orders
     * @return Country
     */
    public function addOrder(\Joki\Bundle\JokiBundle\Entity\OrderN $orders)
    {
        $this->orders[] = $orders;

        return $this;
    }

    /**
     * Remove orders
     *
     * @param \Joki\Bundle\JokiBundle\Entity\OrderN $orders
     */
    public function removeOrder(\Joki\Bundle\JokiBundle\Entity\OrderN $orders)
    {
        $this->orders->removeElement($orders);
    }

    /**
     * Get orders
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getOrders()
    {
        return $this->orders;
    }
}
