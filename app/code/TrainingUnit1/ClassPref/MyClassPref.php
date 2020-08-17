<?php

namespace TrainingUnit1\ClassPref;

use Magento\Theme\Block\Html\Footer;

class MyClassPref extends Footer
{

    /**
     * @return \Magento\Theme\Block\Html\Footer
     */
    public function getCopyright()
    {
        $hello = 'Hello World';
        $copy = parent::getCopyright();
        return $copy . $hello;
    }
}
