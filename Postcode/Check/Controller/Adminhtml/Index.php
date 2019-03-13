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
namespace Postcode\Check\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\Stdlib\DateTime\Filter\Date;
use Magento\Framework\View\Result\PageFactory;
use Postcode\Check\Model\PostcodeFactory;

abstract class Index extends Action
{
    /**
     * @var string
     */
    const ACTION_RESOURCE = 'Postcode_Check::code';
    /**
     * author factory
     *
     * @var AuthorRepositoryInterface
     */
    protected $_postcodeFactory;

    /**
     * Core registry
     *
     * @var Registry
     */
    protected $coreRegistry;

    /**
     * date filter
     *
     * @var \Magento\Framework\Stdlib\DateTime\Filter\Date
     */
    protected $dateFilter;

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Registry $registry
     * @param AuthorRepositoryInterface $authorRepository
     * @param PageFactory $resultPageFactory
     * @param Date $dateFilter
     * @param Context $context
     */
    public function __construct(
        Registry $registry,
        PostcodeFactory $postcodefactory,
        PageFactory $resultPageFactory,
        Date $dateFilter,
        Context $context

    ) {
        $this->coreRegistry      = $registry;
        $this->_postcodeFactory  = $postcodefactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->dateFilter        = $dateFilter;
        parent::__construct($context);
    }

}
