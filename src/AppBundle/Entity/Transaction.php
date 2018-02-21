<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Transaction
 *
 * @ORM\Table(name="transaction")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TransactionRepository")
 */
class Transaction
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
     * @var int
     * @ORM\ManyToOne(targetEntity="User", inversedBy="transactions")
     * @ORM\Column(name="user_id", type="integer")
     */
    private $userId;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="AccountType", inversedBy="transactions")
     * @ORM\Column(name="account_type_id", type="integer")
     */
    private $accountTypeId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="account_number", type="string", length=255, nullable=true)
     */
    private $accountNumber;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_value", type="decimal", precision=2, scale=0)
     */
    private $transactionValue;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_saldo", type="decimal", precision=2, scale=0)
     */
    private $transactionSaldo;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="transactions")
     * @ORM\Column(name="category_id", type="integer")
     */
    private $categoryId;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="TransactionType", inversedBy="transactions")
     * @ORM\Column(name="transaction_type_id", type="integer")
     */
    private $transactionTypeId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="Status", inversedBy="transactions")
     * @ORM\Column(name="status_id", type="integer")
     */
    private $statusId;


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
     * Set userId
     *
     * @param integer $userId
     *
     * @return Transaction
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set accountTypeId
     *
     * @param integer $accountTypeId
     *
     * @return Transaction
     */
    public function setAccountTypeId($accountTypeId)
    {
        $this->accountTypeId = $accountTypeId;

        return $this;
    }

    /**
     * Get accountTypeId
     *
     * @return int
     */
    public function getAccountTypeId()
    {
        return $this->accountTypeId;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Transaction
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
     * Set description
     *
     * @param string $description
     *
     * @return Transaction
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set accountNumber
     *
     * @param string $accountNumber
     *
     * @return Transaction
     */
    public function setAccountNumber($accountNumber)
    {
        $this->accountNumber = $accountNumber;

        return $this;
    }

    /**
     * Get accountNumber
     *
     * @return string
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * Set transactionValue
     *
     * @param string $transactionValue
     *
     * @return Transaction
     */
    public function setTransactionValue($transactionValue)
    {
        $this->transactionValue = $transactionValue;

        return $this;
    }

    /**
     * Get transactionValue
     *
     * @return string
     */
    public function getTransactionValue()
    {
        return $this->transactionValue;
    }

    /**
     * Set transactionSaldo
     *
     * @param string $transactionSaldo
     *
     * @return Transaction
     */
    public function setTransactionSaldo($transactionSaldo)
    {
        $this->transactionSaldo = $transactionSaldo;

        return $this;
    }

    /**
     * Get transactionSaldo
     *
     * @return string
     */
    public function getTransactionSaldo()
    {
        return $this->transactionSaldo;
    }

    /**
     * Set categoryId
     *
     * @param integer $categoryId
     *
     * @return Transaction
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }

    /**
     * Get categoryId
     *
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * Set transactionTypeId
     *
     * @param integer $transactionTypeId
     *
     * @return Transaction
     */
    public function setTransactionTypeId($transactionTypeId)
    {
        $this->transactionTypeId = $transactionTypeId;

        return $this;
    }

    /**
     * Get transactionTypeId
     *
     * @return int
     */
    public function getTransactionTypeId()
    {
        return $this->transactionTypeId;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Transaction
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
     * Set statusId
     *
     * @param integer $statusId
     *
     * @return Transaction
     */
    public function setStatusId($statusId)
    {
        $this->statusId = $statusId;

        return $this;
    }

    /**
     * Get statusId
     *
     * @return int
     */
    public function getStatusId()
    {
        return $this->statusId;
    }
}

