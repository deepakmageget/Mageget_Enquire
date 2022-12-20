<?php
/**
 * 
 * @category  Mageget
 * @package   Mageget_Enquire
 * @author    Mageget
 * @copyright Copyright (c) 2018-2022 Mageget Software Private Limited (https://www.mageget.com/)
 * @license   https://store.mageget.com/license.html
 */
namespace Mageget\Enquire\Model;

use Mageget\Enquire\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
   

   
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'deep_mageget_message';

    /**
     * @var string
     */
    protected $_cacheTag = 'deep_mageget_message';

    /**
     * Prefix of model events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'deep_mageget_message';

    /**
     * Initialize resource model.
     */
    protected function _construct()
    {
        $this->_init('Mageget\Enquire\Model\ResourceModel\Grid');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($Id)
    {
        return $this->setData(self::ID, $Id);
    }

    /**
     * Get Title.
     *
     * @return varchar
     */
    public function getName()
    {
        return $this->getData(self::NAME);
    }

    /**
     * Set Title.
     */
    public function setName($name)
    {
        return $this->setData(self::NAME, $name);
    }
    /**
     * Get Email
     *
     * @return varchar
     */
    public function geteEmail()
    {
        return $this->getData(self::EMAIL);
    }

    /**
     * Set Email
     */
    public function setEmail($email)
    {
        return $this->setData(self::EMAIL, $email);
    }
  /**
     * Get PHONENUMBER
     *
     * @return varchar
     */
    public function getePhonenumber()
    {
        return $this->getData(self::PHONENUMBER);
    }

    /**
     * Set PHONENUMBER
     */
    public function setPhonenumber($phonenumber)
    {
        return $this->setData(self::PHONENUMBER, $phonenumber);
    }

/**
     * Get PHONENUMBER
     *
     * @return varchar
     */
    public function geteDateofbirth()
    {
        return $this->getData(self::DOB);
    }

    /**
     * Set Date of birth
     */
    public function setDateofbirth($Dateofbirth)
    {
        return $this->setData(self::DOB, $Dateofbirth);
    }
 

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set UpdateTime.
     */
 
}