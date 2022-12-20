<?php
/**
 * 
 * @category  Mageget
 * @package   Mageget_Enquire
 * @author    Mageget
 * @copyright Copyright (c) 2018-2022 Mageget Software Private Limited (https://www.mageget.com/)
 * @license   https://store.mageget.com/license.html
 */
namespace Mageget\Enquire\Controller\Adminhtml\Grid;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Mageget\Enquire\Model\ResourceModel\Document\CollectionFactory;

class MassDelete extends Action
{
    public $collectionFactory;

    public $filter;

    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        \Mageget\Enquire\Model\DocumentFactory $documentFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->documentFactory = $documentFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());

            $count = 0;
            foreach ($collection as $model) {
                $model = $this->documentFactory->create()->load($model->getId());
                $model->delete();
                $count++;
            }
            $this->messageManager->addSuccess(__('A total of %1 rows have been deleted.', $count));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('enquire/grid/index');
    }

    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mageget_Enquire::delete');
    }
}