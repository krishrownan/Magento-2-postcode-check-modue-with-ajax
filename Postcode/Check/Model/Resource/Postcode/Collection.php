<?php

namespace Postcode\Check\Model\Resource\Postcode;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
	protected $_idFieldName = 'id';

    protected function _construct()
    {
        $this->_init('Postcode\Check\Model\Postcode', 'Postcode\Check\Model\Resource\Postcode');
    }
}
