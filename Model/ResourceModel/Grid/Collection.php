<?php

/**
 * Grid Grid Collection.
 * @category    Mageget
 * @author      Mageget Software Private Limited
 */
namespace Mageget\Enquire\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * Define resource model.
     */
    protected function _construct()
    {
        $this->_init('Mageget\Enquire\Model\Grid', 'Mageget\Enquire\Model\ResourceModel\Grid');
    }
}