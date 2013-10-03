<?php

namespace Phone\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InboundCallStatusEntity
 *
 * @ORM\Table(name="phone_inbound_call_status")
 * @ORM\Entity
 */
class InboundCallStatusEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=8, nullable=false)
     */
    protected $name;

    // Setters, getters

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
     * @return InboundCallStatusEntity
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
}
