<?php
namespace Postcode\Check\Block;

class Postcode extends \Magento\Framework\View\Element\Template
{

	protected $_registry;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,       
        \Magento\Framework\Registry $registry,
        array $data = []
    )
    {       
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }

    public function _prepareLayout()
    {
        return parent::_prepareLayout();
    }

   public function getFormActionUrl()
    {
        return $this->getUrl('postcode/ajax/code', ['_secure' => true]);
    }

}