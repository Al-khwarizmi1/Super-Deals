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
class Apptha_Superdeals_Adminhtml_DealzController extends Mage_Adminhtml_Controller_Action
{

	protected function _initAction()
	{
		$this->loadLayout()->_setActiveMenu("superdeals/dealz")->_addBreadcrumb(Mage::helper("adminhtml")->__("Dealz  Manager"), Mage::helper("adminhtml")->__("Dealz Manager"));
		return $this;
	}
	//fucntion to view deals details
	public function indexAction()
	{
		$this->_title($this->__("Super Deals"));
		$this->_title($this->__("Manage Deals"));
		// fucntion to view Deals order
		$this->_initAction();
		$this->renderLayout();
	}

	//fucntion to delete deals order report details

	public function deleteAction()
	{
		if ($this->getRequest()->getParam("id") > 0) {
			try {
				$model = Mage::getModel("superdeals/dealz");
				$model->setId($this->getRequest()->getParam("id"))->delete();
				Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item was successfully deleted"));
				$this->_redirect("*/*/");
			} catch (Exception $e) {
				Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
				$this->_redirect("*/*/edit", array("id" => $this->getRequest()->getParam("id")));
			}
		}
		$this->_redirect("*/*/");
	}

	// fucntion to delete deals order report details

	public function massRemoveAction()
	{
		try {
			$ids = $this->getRequest()->getPost('serial_ids', array());
				
			foreach ($ids as $id) {
				$model = Mage::getModel("superdeals/dealz");
				$model->setId($id)->delete();
			}
				
			Mage::getSingleton("adminhtml/session")->addSuccess(Mage::helper("adminhtml")->__("Item(s) was successfully removed"));
		} catch (Exception $e) {
			Mage::getSingleton("adminhtml/session")->addError($e->getMessage());
		}
		$this->_redirect('*/*/');
	}

	// Export order grid to CSV format

	public function exportCsvAction()
	{
		$fileName  = 'dealz.csv';
		$grid      = $this->getLayout()->createBlock('superdeals/adminhtml_dealz_grid');
		$this->_prepareDownloadResponse($fileName, $grid->getCsvFile());
	}
	//  Export order grid to Excel XML format

	public function exportExcelAction()
	{
		$fileName = 'dealz.xml';
		$grid     = $this->getLayout()->createBlock('superdeals/adminhtml_dealz_grid');
		$this->_prepareDownloadResponse($fileName, $grid->getExcelFile($fileName));
	}

}
