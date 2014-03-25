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

class Apptha_Superdeals_Block_Adminhtml_Report_DealStatistics_Grid extends Mage_Adminhtml_Block_Widget_Grid {

	public function __construct() {
		parent::__construct();
		$this->setId('gridDealStatisticsReport');
		$this->setDefaultSort('serial_id');
		$this->setDefaultDir('DESC');
	}

	protected function _prepareCollection() {
		$collection = Mage::getModel('superdeals/dealstatistics')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

	protected function _prepareMassaction() {
		$this->setMassactionIdField('serial_id');
		$this->getMassactionBlock()->setFormFieldName('superdeals');

		$this->getMassactionBlock()->addItem('delete', array(
            'label' 	=> Mage::helper('superdeals')->__('Delete'),
            'url' 		=> $this->getUrl('*/*/massDelete'),
            'confirm' 	=> Mage::helper('superdeals')->__('Are you sure?')
		));
		return $this;
	}

	protected function _prepareColumns() {
		$sym         = Mage::app()->getStore()->getBaseCurrencyCode();
		$now         = Mage::getModel('core/date')->timestamp(time());
		$now         = date('Y-m-d' . ' 00:00:00', $now);
		$collections = Mage::getModel('superdeals/dealstatistics')->getCollection();

		/*$this->addColumn('product_id', array(
		 'header' => $this->__('Product ID'),
		 'type' => 'number',
		 'sortable' => true,
		 'index' => 'product_id'
		 ));*/
		$this->addColumn('serial_id', array(
                'header' 		=> $this->__('Deal ID'),
                'type' 			=> 'number',
                'sortable' 		=> true,
                'index' 		=> 'serial_id',
                'width' 		=> 1
		));
		$this->addColumn('deal_id', array(
                'header' 		=> $this->__('Product Name'),
                'sortable' 		=> true,
                'index' 		=> 'deal_id'
                ));
                $this->addColumn('sku', array(
                'header' 		=> $this->__('SKU'),
                'sortable'		=> true,
                'index' 		=> 'sku'
                ));
                $this->addColumn('actual_price', array(
                'header' 		=> $this->__('Original Price'),
                'sortable' 		=> true,
                'index' 		=> 'actual_price',
                'type' 			=> 'currency',
                'currency_code' => $sym
                ));
                $this->addColumn('deal_price', array(
                'header' 		=> $this->__('Deal Price '),
                'sortable' 		=> true,
                'index' 		=> 'deal_price',
                'type' 			=> 'currency',
                'currency_code' => $sym
                ));
                $this->addColumn('quantity', array(
                'header' 		=> $this->__('Total Quantity Sold'),
                'sortable' 		=> true,
                'index' 		=> 'quantity',
                'default' 		 => $this->__('0'),
                'align' 		=> 'right',
                'type' 			=> 'number',
                'width' 		=> 1
                ));
                $this->addColumn('total_sales', array(
                'header' 		=> $this->__('Sub total'),
                'sortable' 		=> true,
                'index' 		=> 'total_sales',
                'default' 		 => $this->__('0'),
                'type' 			=> 'currency',
                'currency_code' => $sym
                ));
                $this->addColumn('save_amount', array(
                'header' 		=> $this->__('Discount Offered'),
                'sortable' 		=> true,
                'index' 		=> 'save_amount',
                'default' 		 => $this->__('0'),
                'type' 			=> 'currency',
                'currency_code' => $sym
                ));
                $this->addColumn('deal_start_date', array(
                'header' 		 => $this->__('Deal Start Date '),
                'sortable' 		 => true,
                'index' 		 => 'deal_start_date',
                'width' 		 => 1,
                'type' 			 => 'date',
                'align' 		 => 'center',
                'default' 		 => $this->__('N/A'),
                'html_decorators'=> array('nobr')
                ));
                $this->addColumn('deal_end_date', array(
                'header' 		  => $this->__('Deal End Date '),
                'sortable' 		  => true,
                'index' 		  => 'deal_end_date',
                'width' 		  => 1,
                'type' 			  => 'date',
                'align' 		  => 'center',
                'default' 		  => $this->__('N/A'),
                'html_decorators' => array('nobr')
                ));
                 $this->addColumn('status', array(
                'header' 		 => $this->__('Status'),
                'sortable' 		 => true,
                'index' 		 => 'status',
                'width' 		 => 1,
                'align' 		 => 'center',
                'type'      => 'options',
	          	'options'   => array(
	              'Active' => 'Active',
	              'Inactive' => 'Inactive',
	              ),
                ));

                $this->addExportType('*/*/exportDealstatisticsCsv', Mage::helper('superdeals')->__('CSV'));
                $this->addExportType('*/*/exportDealstatisticsExcel', Mage::helper('superdeals')->__('Excel XML'));

                return parent::_prepareColumns();
	}
	 
	public function getRowUrl()
	{
		return $this->null;
	}

}