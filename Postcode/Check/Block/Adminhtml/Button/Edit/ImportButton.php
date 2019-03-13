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
namespace Postcode\Check\Block\Adminhtml\Button\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class ImportButton extends GenericButton implements ButtonProviderInterface
{
    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Import Postcode'),
            'on_click' => sprintf("location.href = '%s';", $this->getImportUrl()),
            'class' => 'save primary'
            
        ];
    }

    /**
     * Get URL for back (reset) button
     *
     * @return string
     */
    public function getImportUrl()
    {
        return $this->getUrl('adminhtml/import/index/');
    }
}

