<?php
/**
 * Sample_News extension
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/mit-license.php
 *
 * @category  Sample
 * @package   Sample_News
 * @copyright 2016 Marius Strajeru
 * @license   http://opensource.org/licenses/mit-license.php MIT License
 * @author    Marius Strajeru
 */
namespace Postcode\Check\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Postcode\Check\Model\Postcode as Postcode;

class NewAction extends Action
{
    /**
     * @var string
     */
    const ACTION_RESOURCE = 'Postcode_Check::postcode';
    /**
     * @var ForwardFactory
     */
    protected $resultForwardFactory;



    /**
     * constructor
     *
     * @param Context $context
     * @param ForwardFactory $resultForwardFactory
     */
    public function __construct(
        Context $context,
        ForwardFactory $resultForwardFactory
    ) {
        $this->resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }


    /**
     * forward to edit
     *
     * @return \Magento\Backend\Model\View\Result\Forward
     */
    public function execute()
    {

        $postcodedata = $this->getRequest()->getParam('postcode');

        $object = $this->_objectManager->create(Postcode::class);

        $resultRedirect = $this->resultRedirectFactory->create();

        $data = $object->load($postcodedata['postcode'],"postcode")->getData();

        if($data){

            $this->messageManager->addError(__("This postcode already exists! please try new one"));

            return $resultRedirect->setPath('*/*/new');         
        }
        
        if(is_array($postcodedata)) {

            $object = $this->_objectManager->create(Postcode::class);
            $object->setData($postcodedata)->save();
            $this->messageManager->addSuccessMessage(__('Postcode saved successfully.'));
            return $resultRedirect->setPath('*/*/index');

        }else{

            $resultForward = $this->resultForwardFactory->create();
            $resultForward->forward('edit');
            return $resultForward;

        }
    }
}
