<?php
/**
 * 
 * @category  Mageget
 * @package   Mageget_Enquire
 * @author    Mageget
 * @copyright Copyright (c) 2018-2022 Mageget Software Private Limited (https://www.mageget.com/)
 * @license   https://store.mageget.com/license.html
 */
namespace Mageget\Enquire\Controller\Form;

class Index extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;

	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $pageFactory)
	{
		$this->_pageFactory = $pageFactory;
		return parent::__construct($context);
	}

	public function execute()
	{
		return $this->_pageFactory->create();
	}
} 


