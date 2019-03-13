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

class Edit extends Index
{
    /**
     * Edit or create author
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
       
        $postid = $this->getRequest()->getParam('id');

        $post = (array) $this->getRequest()->getPost();

        if(!empty($post)){

            $data = $this->getRequest()->getPostValue();

            $save = $this->_postcodeFactory->create()->setData($data['postcode']);

            $save->save();

            $resultRedirect = $this->resultRedirectFactory->create();

            $this->messageManager->addSuccessMessage(__('Postcode Update Successfull!'));

            return $resultRedirect->setPath('*/*/index');

        }

        $this->coreRegistry->register('current_id', $postid);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Postcode_Check::code');
        $resultPage->getConfig()->getTitle()->prepend(__('Postcode'));
        $resultPage->addBreadcrumb(__('Postcode'), __('Postcode'));
        $resultPage->addBreadcrumb(__('Postcode'), __('Postcode'), $this->getUrl('postcode/index'));

        if ($postid === null) {
            $resultPage->addBreadcrumb(__('New Postcode'), __('New Postcode'));
            $resultPage->getConfig()->getTitle()->prepend(__('New Postcode'));
        } else {
            $resultPage->addBreadcrumb(__('Edit Postcode'), __('Edit Postcode'));
            $resultPage->getConfig()->getTitle()->prepend('Edit Postcode');
        }
        return $resultPage;
    }
}
