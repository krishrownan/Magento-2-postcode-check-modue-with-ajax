<?php

namespace Postcode\Check\Model\Resource;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Postcode extends  AbstractDb
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        /* Custom Table Name */
         $this->_init('postcode_check','id');
    }
}
