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

class Apptha_Superdeals_Model_Mysql4_Dealz_Collection extends Mage_Core_Model_Mysql4_Collection_Abstract 
{

    public function _construct() {
        $this->_init("superdeals/dealz");
    }

    /**
     * Join fields 
     *
     * @param string $from
     * @param string $to
     * @return Mage_Reports_Model_Resource_Customer_Totals_Collection
     */
    protected function _joinFields($from = '', $to = '') {
        //$this->addFieldToFilter('created_at', array('from' => $from, 'to' => $to, 'datetime' => true));
        return $this;
    }

    /**
     * Set date range
     *
     * @param string $from
     * @param string $to
     * @return Mage_Reports_Model_Resource_Customer_Totals_Collection
     */
    public function setDateRange($from, $to) {
        $this->_reset()
                ->_joinFields($from, $to);
        return $this;
    }
    
    /**
     * Set store filter collection
     *
     * @param array $storeIds
     * @return Mage_Reports_Model_Resource_Customer_Totals_Collection
     */
    public function setStoreIds($storeIds) {
        if ($storeIds) {
           $this->addFieldToFilter('store_id', array('in' => (array)$storeIds));
        }

        return $this;
    }

}

