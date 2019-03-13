<?php
namespace Postcode\Check\Controller\Post;

class Post extends \Magento\Framework\App\Action\Action
{
	protected $_pageFactory;
	
	public function __construct(
		\Magento\Framework\App\Action\Context $context,
		\Magento\Framework\View\Result\PageFactory $PageFactory
		)
	{
		$this->_pageFactory = $PageFactory;

		parent::__construct($context);
	}

	public function execute()
	{
		$resultpagefactory = $this->_pageFactory->create();

		return $resultpagefactory;
	}
}