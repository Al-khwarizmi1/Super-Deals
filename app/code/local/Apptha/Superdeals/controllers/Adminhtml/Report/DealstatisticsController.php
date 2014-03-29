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

class Apptha_Superdeals_Adminhtml_Report_DealstatisticsController extends Mage_Adminhtml_Controller_Action
{

	/**
	 * fucntion to view deals statistics details
	 */
	public function indexAction()
	{
		$this->_title($this->__('Reports'))
		->_title($this->__('Super Deal Reports'));

		$this->loadLayout()
		->_setActiveMenu('superdeals/dealstatistics')
		->_addBreadcrumb(Mage::helper('reports')->__('Super Deal Reports'), Mage::helper('reports')->__('Super Deal Reports'))
		->_addContent($this->getLayout()->createBlock('superdeals/adminhtml_report_dealstatistics'))
		->renderLayout();
	}
	/**
	 * fucntion to export records as csv file
	 */
	public function exportDealstatisticsCsvAction() {

		$fileName = 'superdeals_report.csv';
		$content  = $this->getLayout()->createBlock('superdeals/adminhtml_report_dealstatistics_grid')
		->getCsv();
		$this->_prepareDownloadResponse($fileName, $content);
	}
	/**
	 * fucntion to export records as excel file
	 */
	public function exportDealstatisticsExcelAction() {

		$fileName = 'superdeals_report.xml';
		$content  = $this->getLayout()->createBlock('superdeals/adminhtml_report_dealstatistics_grid')
		->getExcel($fileName);
		$this->_prepareDownloadResponse($fileName, $content);
	}
	/**
	 * fucntion to delete deals statistics details
	 */
	public function massDeleteAction() {

		$serialIds = $this->getRequest()->getParam('superdeals');
		if (!is_array($serialIds)) {
			Mage::getSingleton('adminhtml/session')->addError(Mage::helper('adminhtml')->__('Please select item(s)'));
		} else {
			try {
				foreach ($serialIds as $serialRequestIds) {
					$sRequest = Mage::getModel('superdeals/dealstatistics')->load($serialRequestIds);
					$sRequest->delete();
				}
				Mage::getSingleton('adminhtml/session')->addSuccess(
				Mage::helper('adminhtml')->__('Total of %d record(s) were successfully deleted', count($serialIds)));
			} catch (Exception $e) {
				Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
			}
		}
		$this->_redirect('*/*/index');
	}

}

