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
     * @ORM\Column(name="transaction_value", type="decimal", precision=19, scale=2)
     */
    private $transactionValue;

    /**
     * @var string
     *
     * @ORM\Column(name="transaction_saldo", type="decimal", precision=19, scale=2)
     */
    private $transactionSaldo;

//    /**
//     * @var int
//     *
//     * @ORM\Column(name="category_id", type="integer")
//     */
//    private $categoryId;

//    /**
//     * @var int
//     *
//     * @ORM\Column(name="transaction_type_id", type="integer")
//     */
//    private $transactionTypeId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="transactions")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $categoryId;

    /**
     * Get category
     *
     * @return mixed
     */
    public function getCategoryId(){
        return $this->categoryId;
    }

    /**
     * @ORM\ManyToOne(targetEntity="AccountType", inversedBy="transactions")
     * @ORM\JoinColumn(name="account_type_id", referencedColumnName="id")
     */
    private $accountTypeId;

    /**
     * Get AccountTypeId
     *
     * @return mixed
     */
    public function getAccountTypeId(){
        return $this->accountTypeId;
    }

    /**
     * @ORM\ManyToOne(targetEntity="TransactionType", inversedBy="transactions")
     * @ORM\JoinColumn(name="transaction_type_id", referencedColumnName="id")
     */
    private $transactionTypeId;

    /**
     * Get TransactionTypeId
     *
     * @return mixed
     */
    public function getTransactionTypeId(){
        return $this->transactionTypeId;
    }

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="transactions")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @return mixed
     */
    public function getUserId(){
        return $this->userId;
    }

    /**
     * @param $userId
     */
    public function setUserId($userId){
        $this->userId = $userId;
    }

    /**
     * @ORM\ManyToOne(targetEntity="TransactionStatus", inversedBy="transactions")
     * @ORM\JoinColumn(name="transaction_status_id", referencedColumnName="id")
     */
    private $statusId;

    /**
     * Get AccountType
     *
     * @return mixed
     */
    public function getStatusId(){
        return $this->statusId;
    }



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
     * Set accountTypeId
     *
     * @param integer $accountTypeId
     *
     */
    public function setAccountTypeId($accountTypeId)
    {
        $this->accountTypeId = $accountTypeId;
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
     * Set transactionTypeId
     *
     * @param integer $transactionTypeId
     *
     * @return Transaction
     */
    public function setTransactionTypeId($transactionTypeId)
    {
        $this->transactionTypeId = $transactionTypeId;
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
}

