<?php

/**
 * @name            :  Super Deals
 * @version         :  1.1
 * @author          :  Apptha - http://www.apptha.com
 * @copyright       :  Copyright (C) 2013 Powered by Apptha
 * @license         :  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @Creation Month  :  April 2013
 *
 * */

class Apptha_Superdeals_Model_Slideorder
{
    /*
     * Notify mail details by getting number of days 
     */
    public function toOptionArray() 
    {
        return array(
            array('value' => 1, 'label' => Mage::helper('superdeals')->__('Lower to High Price')),
            array('value' => 2, 'label' => Mage::helper('superdeals')->__('Higher to Low Price')),
            array('value' => 3, 'label' => Mage::helper('superdeals')->__('Random Display')),
        );
    }

}
