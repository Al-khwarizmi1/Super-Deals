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

class Apptha_Superdeals_Block_Adminhtml_Report_Dealstatistics extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_controller = 'adminhtml_report_dealstatistics';
        $this->_blockGroup = "superdeals";
        $this->_headerText = Mage::helper('superdeals')->__('Super Deal Reports');
        parent::__construct();
        $this->_removeButton('add');
    }
} 