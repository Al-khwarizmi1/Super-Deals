<?php
/**
 * Apptha
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the EULA
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.apptha.com/LICENSE.txt
 *
 * ==============================================================
 *                 MAGENTO EDITION USAGE NOTICE
 * ==============================================================
 * This package designed for Magento COMMUNITY edition
 * Apptha does not guarantee correct work of this extension
 * on any other Magento edition except Magento COMMUNITY edition.
 * Apptha does not provide extension support in case of
 * incorrect edition usage.
 * ==============================================================
 *
 * @category    Apptha
 * @package     Apptha_SuperDeals
 * @version    0.1.2
 * @author      Apptha Team <developers@contus.in>
 * @copyright   Copyright (c) 2014 Apptha. (http://www.apptha.com)
 * @license     http://www.apptha.com/LICENSE.txt
 * 
 */


class Apptha_Superdeals_Block_Adminhtml_Report_Dealz_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

	public function __construct() {
		parent::__construct();
		$this->setId('gridDealzReport');
		$this->setDefaultSort('order_no');
		$this->setDefaultDir('DESC');
	}

	protected function _prepareCollection() {
		$collection = Mage::getModel('superdeals/dealz')->getCollection();
		$this->setCollection($collection);
		return parent::_prepareCollection();
	}

	protected function _prepareMassaction() {
		$this->setMassactionIdField('serial_id');
		$this->getMassactionBlock()->setFormFieldName('superdeals');

		$this->getMassactionBlock()->addItem('delete', array(
            'label' => Mage::helper('superdeals')->__('Delete'),
            'url' => $this->getUrl('*/*/massDelete'),
            'confirm' => Mage::helper('superdeals')->__('Are you sure?')
		));
		return $this;
	}

	protected function _prepareColumns() {
		$sym         = Mage::app()->getStore()->getBaseCurrencyCode();

		$this->addColumn('order_no', array(
            'header' 		 => $this->__('Order #'),
            'sortable' 		 => true,
            'default' 		 => 'desc',
            'index' 		 => 'order_no',
        	'width' 		 => 1
		));
		$this->addColumn('purchase_date', array(
            'header' 		  => $this->__('Purchased On'),
            'sortable' 		  => true,
            'index' 		  => 'purchase_date',
            'width' 		  => 0.5,
            'type' 			  => 'datetime',
            'align' 		  => 'left',
            'default' 		  => $this->__('N/A'),
            'html_decorators' => array('nobr')
		));
		$this->addColumn('customer_id', array(
            'header' 		  => $this->__('Customer Name'),
            'sortable' 		  => true,
            'index' 		  => 'customer_id'
            ));
            $this->addColumn('customer_mail_id', array(
            'header' 		  => $this->__('Email'),
            'sortable'		  => true,
            'index' 		  => 'customer_mail_id'
            ));
            $this->addColumn('deal_id', array(
            'header' 		   => $this->__('Product Name'),
            'sortable' 		   => true,
            'index' 		   => 'deal_id'
            ));
            $this->addColumn('quantity', array(
            'header' 			=> $this->__('Quantity'),
            'sortable' 			=> true,
            'index' 			=> 'quantity',
            'type' 				=> 'number',
            'align' 			=> 'right'
            ));
            $this->addColumn('actual_price', array(
            'header' 			=> $this->__('Original Price'),
            'sortable' 			=> true,
            'index' 			=> 'actual_price',
            'align' 			=> 'right',
            'type' 				=> 'currency',
            'currency_code' 	=> $sym
            ));
            $this->addColumn('deal_price', array(
            'header' 			=> $this->__('Deal Price'),
            'sortable' 			=> true,
            'index' 			=> 'deal_price',
            'align' 			=> 'right',
            'type' 				=> 'currency',
            'currency_code' 	=> $sym
            ));
            $this->addColumn('status', array(
            'header' 			=> $this->__('Status'),
            'sortable' 			=> true,
            'index' 			=> 'status',
            'align' 			=> 'left',
         	'width' 			=> 1            
            ));
             
            $this->addExportType('*/*/exportDealzCsv', Mage::helper('superdeals')->__('CSV'));
            $this->addExportType('*/*/exportDealzExcel', Mage::helper('superdeals')->__('Excel XML'));

            return parent::_prepareColumns();
	}
	public function getRowUrl()
	{
		return $this->null;
	}


}