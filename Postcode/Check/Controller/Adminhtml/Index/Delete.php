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

use Postcode\Check\Controller\Adminhtml\Index;

class Delete extends Index
{
    /**
     * @return \Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();

        $id = $this->getRequest()->getParam('id');
        if ($id) {

            $delete = $this->_postcodeFactory->create()->load($id);

            $delete->delete();

            $this->messageManager->addSuccessMessage(__('The Postcode has been deleted.'));

            $resultRedirect->setPath('postcode/*/');

            return $resultRedirect;

        }
        $this->messageManager->addErrorMessage(__('We can\'t find a author to delete.'));
        $resultRedirect->setPath('postcode/*/');
        return $resultRedirect;
    }
}
