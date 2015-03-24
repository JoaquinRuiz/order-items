<?php

namespace Joki\Bundle\JokiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * OrderN
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Joki\Bundle\JokiBundle\Entity\OrderNRepository")
 */
class OrderN
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
     * @ORM\OneToMany(targetEntity="Item", mappedBy="order")
     */
    protected $items;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="orders")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="Country", inversedBy="orders")
     * @ORM\JoinColumn(name="country_id", referencedColumnName="id")
     */
    protected $country;

    /**
     * @var string
     *
     * @ORM\Column(name="totalprice", type="string", length=255)
     */
    private $totalprice;


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
     * Set items
     *
     * @param string $items
     * @return OrderN
     */
    public function setItems($items)
    {
        $this->items = $items;

        return $this;
    }

    /**
     * Get items
     *
     * @return string 
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Set user
     *
     * @param string $user
     * @return OrderN
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return string 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return OrderN
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set totalprice
     *
     * @param string $totalprice
     * @return OrderN
     */
    public function setTotalprice($totalprice)
    {
        $this->totalprice = $totalprice;

        return $this;
    }

    /**
     * Get totalprice
     *
     * @return string 
     */
    public function getTotalprice()
    {
        return $this->totalprice;
    }

    /**
     *
     */
    public function __construct()
    {
        $this->items = new ArrayCollection();
    }


    /**
     * Add items
     *
     * @param \Joki\Bundle\JokiBundle\Entity\Item $items
     * @return OrderN
     */
    public function addItem(\Joki\Bundle\JokiBundle\Entity\Item $items)
    {
        $this->items[] = $items;

        return $this;
    }

    /**
     * Remove items
     *
     * @param \Joki\Bundle\JokiBundle\Entity\Item $items
     */
    public function removeItem(\Joki\Bundle\JokiBundle\Entity\Item $items)
    {
        $this->items->removeElement($items);
    }
}
