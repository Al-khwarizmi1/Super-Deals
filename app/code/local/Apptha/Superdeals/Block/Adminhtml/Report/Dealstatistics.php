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