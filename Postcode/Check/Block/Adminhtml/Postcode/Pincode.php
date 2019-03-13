<?php
namespace Postcode\Check\Block\Adminhtml\Postcode;

class Pincode extends \Magento\Framework\View\Element\Template
{

	protected $_postFactory;
	
	public function __construct(

		\Magento\Framework\View\Element\Template\Context $context

		/*\Product\Carousel\Model\SliderFactory $sliderFactory*/

	)
	{

		/*$this->_postFactory = $sliderFactory;*/

		parent::__construct($context);
	}

	public function display($value='')
	{
		return __('Hello World');
	}

	public function get_result()
	{
		/*$model = $this->_objectManager->create('Product\Carousel\Model\Slider'); 

        $test  = $model->load(1);

        return $test->getCollection()->getData();*/

        /*$post = $this->_postFactory->create();
        
		return $post->getCollection();*/
	}

	

}