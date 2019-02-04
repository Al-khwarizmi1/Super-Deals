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

class Apptha_Superdeals_Helper_Data extends Mage_Core_Helper_Abstract
{

	const STORE_CONFIG_BESTSELLING_SIDEBAR_COUNT        = 'superdeals/topsellingsidebar/product_count';
	const STORE_CONFIG_MOSTVIEWED_SIDEBAR_COUNT        	= 'superdeals/mostviewedsidebar/product_count';
	const STORE_CONFIG_OFFER_SLIDER_COUNT        		= 'superdeals/slider/enable_slide';

	/*function to check if superdeals enabled */
	public function isDealzEnabled()
	{
		return Mage::getStoreConfig('superdeals/superdeals_group/deals_enable');
	}

	/*function to check if Mail is enabled */
	public function isMailEnabled()
	{
		return Mage::getStoreConfig('superdeals/general/send_email_statistics');
	}

	/*function to check if Timer is enabled */
	public function isTimerEnabled()
	{
		return Mage::getStoreConfig('superdeals/timer/show_timer');
	}

	/*function to check if Timer is enabled */
	public function isCustomColorEnabled()
	{
		return Mage::getStoreConfig('superdeals/timer/custom_color_enable');
	}

	/*function to check if Top Selling left sidebar is enabled */
	public function isBestSellingLeftEnabled()
	{
		return Mage::getStoreConfig('superdeals/topsellingsidebar/enable_left');
	}

	/*function to check if Top Selling right sidebar is enabled */
	public function isBestSellingRightEnabled()
	{
		return Mage::getStoreConfig('superdeals/topsellingsidebar/enable_right');
	}

	/*function to check if Most Viewed left sidebar is enabled */
	public function isMostViewedLeftEnabled()
	{
		return Mage::getStoreConfig('superdeals/mostviewedsidebar/enable_left');
	}
	/*function to check if Most Viewed right sidebar is enabled */
	public function isMostViewedRightEnabled()
	{
		return Mage::getStoreConfig('superdeals/mostviewedsidebar/enable_right');
	}

	/*function to check if Deal of the day left sidebar is enabled */
	public function isDealOfDayLeftEnabled()
	{
		return Mage::getStoreConfig('superdeals/dealofthedaysidebar/enable_left');
	}
	/*function to check if Deal of the day right sidebar is enabled */
	public function isDealOfDayRightEnabled()
	{
		return Mage::getStoreConfig('superdeals/dealofthedaysidebar/enable_right');
	}

	/*function to get number of products to display in bestselling sidebar */
	public function getBestsellingSidebar()
	{
		$num = (int)Mage::getStoreConfig(self::STORE_CONFIG_BESTSELLING_SIDEBAR_COUNT);
		return $num >= 0 ? $num : 3;
	}
	/*function to get number of products to display in mostviewed sidebar */
	public function getMostviewedSidebar()
	{
		$num = (int)Mage::getStoreConfig(self::STORE_CONFIG_MOSTVIEWED_SIDEBAR_COUNT);
		return $num >= 0 ? $num : 3;
	}
	public function getOfferSlider()
	{
		$num = (int)Mage::getStoreConfig('superdeals/slider/slide_count');
		if($num){
		return $num;
		} 
		return 5;
	}	
	/*function to get whether the the module is enabled or not */
	public function isSliderEnabled()
	{
		return Mage::getStoreConfig('superdeals/slider/enable_slide');
	}
	public function domainKey($tkey) {

		$message = "EM-SDEALSMP0EFIL9XEV8YZAL7KCIUQ6NI5OREH4TSEB3TSRIF2SI1ROTAIDALG-JW";

		for ($i = 0; $i < strlen($tkey); $i++) {
			$key_array[] = $tkey[$i];
		}
		$enc_message = "";
		$kPos = 0;
		$chars_str = "WJ-GLADIATOR1IS2FIRST3BEST4HERO5IN6QUICK7LAZY8VEX9LIFEMP0";
		for ($i = 0; $i < strlen($chars_str); $i++) {
			$chars_array[] = $chars_str[$i];
		}
		for ($i = 0; $i < strlen($message); $i++) {
			$char = substr($message, $i, 1);

			$offset = $this->getOffset($key_array[$kPos], $char);
			$enc_message .= $chars_array[$offset];
			$kPos++;
			if ($kPos >= count($key_array)) {
				$kPos = 0;
			}
		}

		return $enc_message;
	}
	public function getOffset($start, $end) {

		$chars_str = "WJ-GLADIATOR1IS2FIRST3BEST4HERO5IN6QUICK7LAZY8VEX9LIFEMP0";
		for ($i = 0; $i < strlen($chars_str); $i++) {
			$chars_array[] = $chars_str[$i];
		}

		for ($i = count($chars_array) - 1; $i >= 0; $i--) {
			$lookupObj[ord($chars_array[$i])] = $i;
		}

		$sNum = $lookupObj[ord($start)];
		$eNum = $lookupObj[ord($end)];

		$offset = $eNum - $sNum;

		if ($offset < 0) {
			$offset = count($chars_array) + ($offset);
		}

		return $offset;
	}
	public function getDealUrl() {
		return Mage::getBaseUrl().'deals';
	}
}