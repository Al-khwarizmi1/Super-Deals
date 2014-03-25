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
class Apptha_Superdeals_IndexController extends Mage_Core_Controller_Front_Action
{
	/**
	 * fucntion to redirect deals page
	 */
	public function IndexAction() 
	{
		$this->loadLayout();
		$this->renderLayout();
	}

}

