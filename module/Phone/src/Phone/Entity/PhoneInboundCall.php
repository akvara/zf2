<?php

namespace Phone\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PhoneInboundCall
 *
 * @ORM\Table(name="phone_inbound_call", indexes={@ORM\Index(name="phone_inbound_call_status_id", columns={"phone_inbound_call_status_id"})})
 * @ORM\Entity
 */
class PhoneInboundCall
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="asterisk_unique_id", type="string", length=16, nullable=false)
     */
    private $asteriskUniqueId;

    /**
     * @var string
     *
     * @ORM\Column(name="asterisk_call_id", type="string", length=64, nullable=false)
     */
    private $asteriskCallId;

    /**
     * @var integer
     *
     * @ORM\Column(name="destination_number", type="integer", nullable=false)
     */
    private $destinationNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="dial_plan", type="string", length=64, nullable=false)
     */
    private $dialPlan;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var \Phone\Entity\PhoneInboundCallStatus
     *
     * @ORM\ManyToOne(targetEntity="Phone\Entity\PhoneInboundCallStatus")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="phone_inbound_call_status_id", referencedColumnName="id")
     * })
     */
    private $phoneInboundCallStatus;



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
     * @return PhoneInboundCall
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
     * @return PhoneInboundCall
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
     * @return PhoneInboundCall
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
     * @return PhoneInboundCall
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
     * @return PhoneInboundCall
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
     * @return PhoneInboundCall
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
     * @param \Phone\Entity\PhoneInboundCallStatus $phoneInboundCallStatus
     * @return PhoneInboundCall
     */
    public function setPhoneInboundCallStatus(\Phone\Entity\PhoneInboundCallStatus $phoneInboundCallStatus = null)
    {
        $this->phoneInboundCallStatus = $phoneInboundCallStatus;

        return $this;
    }

    /**
     * Get phoneInboundCallStatus
     *
     * @return \Phone\Entity\PhoneInboundCallStatus 
     */
    public function getPhoneInboundCallStatus()
    {
        return $this->phoneInboundCallStatus;
    }
}
