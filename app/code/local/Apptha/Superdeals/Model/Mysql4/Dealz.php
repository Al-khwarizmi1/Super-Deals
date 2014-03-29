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

class Apptha_Superdeals_Model_Mysql4_Dealz extends Mage_Core_Model_Mysql4_Abstract 
{

    protected function _construct() {
        $this->_init("superdeals/dealz", "serial_id");
    }

}

