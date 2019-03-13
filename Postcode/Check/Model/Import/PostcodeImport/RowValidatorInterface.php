<?php
namespace Postcode\Check\Model\Import\PostcodeImport;
interface RowValidatorInterface extends \Magento\Framework\Validator\ValidatorInterface
{
       const ERROR_INVALID_TITLE= 'InvalidValueTITLE';
       const ERROR_POSTCODE_IS_EMPTY = 'EmptyMessage';
    /**
     * Initialize validator
     *
     * @return $this
     */
    public function init($context);
}