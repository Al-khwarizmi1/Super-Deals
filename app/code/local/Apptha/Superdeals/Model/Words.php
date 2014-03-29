<?php
/**
 *
 * @package         Super Deals
 * @version         1.1
 * @since           Magento 1.5
 * @author          Apptha Team
 * @copyright       Copyright (C) 2014 Powered by Apptha
 * @license         http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @Creation Date   August 2012
 * @Modified By     Murali B
 * @Modified Date   Mar 29 2014
 *
 * */

class Apptha_Superdeals_Model_Words 
{
    /*
     * Notify mail details by getting number of days 
     */
    public function toOptionArray() 
    {
        return array(
            array('value' => 1, 'label' => Mage::helper('superdeals')->__('1 Day')),
            array('value' => 2, 'label' => Mage::helper('superdeals')->__('2 Days')),
            array('value' => 3, 'label' => Mage::helper('superdeals')->__('3 Days')),
            array('value' => 4, 'label' => Mage::helper('superdeals')->__('4 Days')),
        );
    }

}
