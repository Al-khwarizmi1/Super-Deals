<?php

/**
 * @name            :  Superdeals
 * @version         :  1.1
 * @author          :  Apptha - http://www.apptha.com
 * @copyright       :  Copyright (C) 2011 Powered by Apptha
 * @license         :  http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 * @Creation Date   :  March 2013
 *
 * */

class Apptha_Superdeals_Model_Mysql4_Dealz extends Mage_Core_Model_Mysql4_Abstract 
{

    protected function _construct() {
        $this->_init("superdeals/dealz", "serial_id");
    }

}

