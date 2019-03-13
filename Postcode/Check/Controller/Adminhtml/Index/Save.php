<?php
/**
 * Copyright © 2015 Pagseguro. All rights reserved.
 */

namespace Product\Carousel\Controller\Adminhtml\Index;

use Product\Carousel\Controller\Adminhtml\Index;

class Save extends Index
{
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        print_r($data);


        die();
    }
}
