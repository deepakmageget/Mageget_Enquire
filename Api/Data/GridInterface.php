<?php
/**
 * Mageget_Grid Grid Interface.
 *
 * @category    Mageget
 *
 * @author      Mageget Software Private Limited
 */
namespace Mageget\Enquire\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const PHONENUMBER = 'phonenumber';
    const DOB = 'dob';
    const STATUS = 'status';
    const CREATED_AT = 'created_at';
    const UPDATE_TIME = 'update_time';


    /**
     * Get Id.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set Id.
     */
    public function setEntityId($Id);

    /**
     * Get Name.
     *
     * @return varchar
     */
    public function getName();

    /**
     * Set Name.
     */
    public function setName($name);

    /**
     * Get Email.
     *
     * @return varchar
     */
    public function geteEmail();

    /**
     * Set Email.
     */
    public function setEmail($email);
   
    /**
     * Get Phonenumber.
     *
     * @return varchar
     */
    public function getePhonenumber();

    /**
     * Set Phonenumber.
     */
    public function setPhonenumber($phonenumber);


   /**
     * Get geteDob.
     *
     * @return varchar
     */
    public function geteDateofbirth();

    /**
     * Set geteDob.
     */
    public function setDateofbirth($Dateofbirth);
    
    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);


    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime();

    /**
     * Set UpdateTime.
     */
    // public function setUpdateTime($updateTime);

   
}