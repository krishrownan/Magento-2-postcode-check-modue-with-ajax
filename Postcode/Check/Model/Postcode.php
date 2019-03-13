<?php

namespace Postcode\Check\Model;

use Magento\Framework\Model\AbstractModel;

class Postcode extends AbstractModel
{
    public function _construct(){

         $this->_init('Postcode\Check\Model\Resource\Postcode');
    }     
}