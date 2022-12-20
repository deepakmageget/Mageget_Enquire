<?php

namespace Mageget\Enquire\Controller\Adminhtml\Grid; 

use \Mageget\Enquire\Model\DocumentFactory;
use \Magento\Framework\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory; 
use \Magento\Store\Model\StoreManagerInterface;
class Formdata extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory; 
    protected $_storeManager;
	protected $_modelFactory;
	public function __construct(
		Context $context,
		PageFactory $pageFactory,
        StoreManagerInterface $storeManager,
        DocumentFactory $modelFactory)
       
	{
		$this->_pageFactory = $pageFactory;
        $this->_storeManager = $storeManager;
        $this->_modelFactory =  $modelFactory;
		return parent::__construct($context);
	}

	public function execute()
	{ 
		$mediapath =  $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
		$post = $this->_modelFactory->create();
		$collection = $post->getCollection();
		foreach($collection as $item){
			echo "<pre>";
			print_r($item->getData());
			echo "</pre>";
			$dbimg = $item->getData('upload_file');
			$imagepath = $mediapath.'mageget_enquire/'.$dbimg;
			echo "<img src='$imagepath'>";
		}
		exit();

		$url =  $this->_storeManager->getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA);
        $resultPage = $this->_pageFactory->create();
        return $resultPage;    
		
	}  
 
} 


