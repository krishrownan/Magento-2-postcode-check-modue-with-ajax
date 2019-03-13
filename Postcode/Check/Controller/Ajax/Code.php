<?php
namespace Postcode\Check\Controller\Ajax;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Postcode\Check\Model\PostcodeFactory;

class Code extends \Magento\Framework\App\Action\Action
{

     /**
     * @var Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    protected $resultJsonFactory; 

    protected $postcodeFactory;

    /**
     * @param Context     $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        JsonFactory $resultJsonFactory,
        PostcodeFactory $PostFactory
        )
    {

        $this->resultPageFactory = $resultPageFactory;
        $this->resultJsonFactory = $resultJsonFactory; 
        $this->postcodeFactory = $PostFactory;
        return parent::__construct($context);
    }


    public function execute()
    {
        $postcode = $this->getRequest()->getParam('postcode');

        $result = $this->resultJsonFactory->create();
        $resultPage = $this->resultPageFactory->create();

        $factory = $this->postcodeFactory->create()->load($postcode,"postcode");

        $getdata = $factory->getData();

/*	    $objectManager = \Magento\Framework\App\ObjectManager::getInstance(); // Instance of object manager
		$resource = $objectManager->get('Magento\Framework\App\ResourceConnection');
		$connection = $resource->getConnection();
		$tableName = $resource->getTableName('postcode_check'); //gives table name with prefix

        $sql = "SELECT * FROM $tableName WHERE code='".$postcode."'";*/

        // $block = $resultPage->getLayout()
        //         ->createBlock('Vendor\Module\Block\Index')
        //         ->setTemplate('Vendor_Module::result.phtml')
        //         ->setData('height',$height)
        //         ->setData('weight',$weight)
        //         ->toHtml();

/*        $data = $connection->query($sql);

        $get_data = array();

        foreach ($data as $key => $value) {
        	
        	$get_data['service'] = $value['service'];

        }*/

        $result->setData($getdata);
        return $result;
    } 
}