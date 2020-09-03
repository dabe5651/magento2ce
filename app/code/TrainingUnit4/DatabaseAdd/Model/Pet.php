<?php


namespace TrainingUnit4\DatabaseAdd\Model;


class Pet extends \Magento\Framework\Model\AbstractModel
{
    protected function _construct()
    {
        $this->_init(\TrainingUnit4\DatabaseAdd\Model\ResourceModel\Pet::class);
    }

}
