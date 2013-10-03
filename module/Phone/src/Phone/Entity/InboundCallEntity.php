<?php

namespace Phone\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InboundCallEntity
 *
 * @ORM\Table(name="phone_inbound_call", indexes={@ORM\Index(name="phone_inbound_call_status_id", columns={"phone_inbound_call_status_id"})})
 * @ORM\Entity
 */
class InboundCallEntity
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
     * @ORM\Column(name="asterisk_unique_id", type="string", length=16, nullable=false)
     */
    protected $asteriskUniqueId;

    /**
     * @var string
     *
     * @ORM\Column(name="asterisk_call_id", type="string", length=64, nullable=false)
     */
    protected $asteriskCallId;

    /**
     * @var integer
     *
     * @ORM\Column(name="destination_number", type="integer", nullable=false)
     */
    protected $destinationNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="dial_plan", type="string", length=64, nullable=false)
     */
    protected $dialPlan;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    protected $updatedAt;

    /**
     * @var \Phone\Entity\InboundCallStatusEntity
     *
     * @ORM\ManyToOne(targetEntity="Phone\Entity\InboundCallStatusEntity")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_inbound_call_status_id", referencedColumnName="id")
     * })
     */
    protected $inboundCallStatus;



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
     * Set asteriskUniqueId
     *
     * @param string $asteriskUniqueId
     * @return InboundCallEntity
     */
    public function setAsteriskUniqueId($asteriskUniqueId)
    {
        $this->asteriskUniqueId = $asteriskUniqueId;

        return $this;
    }

    /**
     * Get asteriskUniqueId
     *
     * @return string
     */
    public function getAsteriskUniqueId()
    {
        return $this->asteriskUniqueId;
    }

    /**
     * Set asteriskCallId
     *
     * @param string $asteriskCallId
     * @return InboundCallEntity
     */
    public function setAsteriskCallId($asteriskCallId)
    {
        $this->asteriskCallId = $asteriskCallId;

        return $this;
    }

    /**
     * Get asteriskCallId
     *
     * @return string
     */
    public function getAsteriskCallId()
    {
        return $this->asteriskCallId;
    }

    /**
     * Set destinationNumber
     *
     * @param integer $destinationNumber
     * @return InboundCallEntity
     */
    public function setDestinationNumber($destinationNumber)
    {
        $this->destinationNumber = $destinationNumber;

        return $this;
    }

    /**
     * Get destinationNumber
     *
     * @return integer
     */
    public function getDestinationNumber()
    {
        return $this->destinationNumber;
    }

    /**
     * Set dialPlan
     *
     * @param string $dialPlan
     * @return InboundCallEntity
     */
    public function setDialPlan($dialPlan)
    {
        $this->dialPlan = $dialPlan;

        return $this;
    }

    /**
     * Get dialPlan
     *
     * @return string
     */
    public function getDialPlan()
    {
        return $this->dialPlan;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return InboundCallEntity
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return InboundCallEntity
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set phoneInboundCallStatus
     *
     * @param \Phone\Entity\InboundCallStatusEntity $phoneInboundCallStatus
     * @return InboundCallEntity
     */
    public function setInboundCallStatus(\Phone\Entity\InboundCallStatusEntity $phoneInboundCallStatus = null)
    {
        $this->inboundCallStatus = $phoneInboundCallStatus;

        return $this;
    }

    /**
     * Get phoneInboundCallStatus
     *
     * @return \Phone\Entity\InboundCallStatusEntity
     */
    public function getInboundCallStatus()
    {
        return $this->inboundCallStatus;
    }
}
