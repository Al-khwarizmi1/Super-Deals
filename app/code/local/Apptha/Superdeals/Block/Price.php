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

class Apptha_Superdeals_Block_Price extends Mage_Catalog_Block_Product_View {

	protected function _prepareLayout()
	{
		$simpleBlock  = $this->getLayout()->getBlock('product.info.simple');
		$virtualBlock = $this->getLayout()->getBlock('product.info.virtual');
		$groupedBlock = $this->getLayout()->getBlock('product.info.grouped');
		$configurableBlock = $this->getLayout()->getBlock('product.info.configurable');


		if ($simpleBlock) {
			$simpleBlock->setTemplate('superdeals/price.phtml');
		}
		else if ($virtualBlock) {
			$virtualBlock->setTemplate('superdeals/price.phtml');
		}
		else if($configurableBlock){
			$configurableBlock->setTemplate('superdeals/price.phtml');
		}
		else if($groupedBlock){
			$groupedBlock->setTemplate('superdeals/price.phtml');
		}

	}

}