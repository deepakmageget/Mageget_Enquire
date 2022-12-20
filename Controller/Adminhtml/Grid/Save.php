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
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Image\AdapterFactory;
use Magento\Framework\Filesystem;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \Webkul\Grid\Model\GridFactory
     */
    var $gridFactory;
 /**
     * @var UploaderFactory
     */
	protected $uploaderFactory;
	
	/**
     * @var AdapterFactory
     */
    protected $adapterFactory;
	
	/**
     * @var Filesystem
     */
    protected $filesystem;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Mageget\Enquire\Model\GridFactory $gridFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Mageget\Enquire\Model\GridFactory $gridFactory,
        UploaderFactory $uploaderFactory,
        AdapterFactory $adapterFactory,
        Filesystem $filesystem
    ) {
        parent::__construct($context); 
        $this->gridFactory = $gridFactory;  
        $this->uploaderFactory = $uploaderFactory;
        $this->adapterFactory = $adapterFactory;
        $this->filesystem = $filesystem;
        $this->_mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
    }  

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('enquire/grid/addrow');
            return;
        }
        try {
            $rowData = $this->gridFactory->create();

                    $files = $this->getRequest()->getFiles('file');
                    $target = $this->_mediaDirectory->getAbsolutePath('mageget_enquire/');        
                    //attachment is the input file name posted from your form
                    $uploader = $this->uploaderFactory->create(['fileId' => 'upload_file']);
                    $_fileType = $uploader->getFileExtension();
                    $uniqid = uniqid();
                    $newFileName = $uniqid .'.'. $_fileType;
                    $uploader->setAllowedExtensions(['jpg', 'jpeg', 'png']);

                    $uploader->setAllowRenameFiles(true);

                   
                    $result = $uploader->save($target,$newFileName); 

                $data['upload_file'] =  $newFileName;
           
                  $rowData->setData($data);

             if (isset($data['id'])) {
               $rowData->setEntityId($data['id']);                 
            }  

         $rowData->save();
            $this->messageManager->addSuccess(__('Record has been successfully saved.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('enquire/grid/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Mageget_Enquire::save');
    }
}