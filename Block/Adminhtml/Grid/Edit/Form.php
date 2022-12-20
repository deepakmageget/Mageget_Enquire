<?php
namespace Mageget\Enquire\Block\Adminhtml\Grid\Edit;
/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \Mageget\Enquire\Model\Status $options, 
        array $data = []
    ) 
    {
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }
    /**
     * Prepare form.
     *
     * @return $this
     */ 



    protected function _prepareForm()
    { 
       
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT); 
      
        // $mediaUrl = $this ->_storeManager-> getStore()->getBaseUrl(\Magento\Framework\UrlInterface::URL_TYPE_MEDIA );
       
  

        $model = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                            'id' => 'edit_form', 
                            'enctype' => 'multipart/form-data', 
                            'action' => $this->getData('action'), 
                            'method' => 'post'
                        ]
            ]
        );
        $form->setHtmlIdPrefix('magegrid_');
        if ($model->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Row Data'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Row Data'), 'class' => 'fieldset-wide']
            );
        }
        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'id' => 'name',
                'title' => __('Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email'),
                'id' => 'email',
                'title' => __('Email'),
                'class' => 'validate-email',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'phonenumber',
            'text',
            [
                'name' => 'phonenumber',
                'label' => __('Phone Number'),
                'id' => 'phonenumber',
                'title' => __('Phone Number'),
                'class' => 'required-entry validate-phoneUs',
                'required' => true,
            ]
        );
        $fieldset->addField(
            'dob',
            'date',
            [
                'name' => 'dob',
                'label' => __('Date of Birth'),
                'title' => __('Date of Birth'), 
                'date_format' => 'yyyy-MM-dd',
                'class' => 'required-entry',
                'required' => true
            ]
        );
        // $fieldset->addField(
        //     'upload_file',
        //     'file',
        //     [
        //         'name' => 'upload_file',
        //         'label' => __('image'),
        //         'title' => __('image'), 
        //         'class' => 'required-entry',
        //         'required' => true
        //     ]
        // );  
     
        $fieldset->addField(
            'upload_file','file', [
                'name' => 'upload_file',
                'label' => __('Image'),
                'title' => __('Image'),
                'class' => 'required-entry',
                'required' => true,
                
            ],
        );

         
        // $wysiwygConfig = $this->_wysiwygConfig->getConfig(['tab_id' => $this->getTabId()]);
        // $fieldset->addField(
        //     'content',
        //     'editor',
        //     [
        //         'name' => 'content',
        //         'label' => __('Content'),
        //         'style' => 'height:36em;',
        //         'required' => true,
        //         'config' => $wysiwygConfig
        //     ]
        // );
        // $fieldset->addField(
        //     'publish_date',
        //     'date',
        //     [
        //         'name' => 'publish_date',
        //         'label' => __('Publish Date'),
        //         'date_format' => $dateFormat,
        //         'time_format' => 'HH:mm:ss',
        //         'class' => 'validate-date validate-date-range date-range-custom_theme-from',
        //         'class' => 'required-entry',
        //         'style' => 'width:200px',
        //     ]
        // );
        // $fieldset->addField(
        //     'is_active',
        //     'select',
        //     [
        //         'name' => 'is_active',
        //         'label' => __('Status'),
        //         'id' => 'is_active',
        //         'title' => __('Status'),
        //         'values' => $this->_options->getOptionArray(),
        //         'class' => 'status',
        //         'required' => true,
        //     ]
        // );
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
        return parent::_prepareForm();
    }
}