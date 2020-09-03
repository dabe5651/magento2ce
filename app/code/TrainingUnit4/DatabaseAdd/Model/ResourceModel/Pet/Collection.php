<?php

namespace TrainingUnit4\DatabaseAdd\Model\ResourceModel\Pet;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init(
            \TrainingUnit4\DatabaseAdd\Model\ResourceModel\Pet::class,
            \TrainingUnit4\DatabaseAdd\Model\Pet::class
        );
    }
}
