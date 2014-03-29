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
	
	public function isSliderEnabled()
	{
		return Mage::getStoreConfig('superdeals/slider/enable_slide');
	}
	
	public function superDealsApiKey()
	{

		$code = $this->genenrateOscdomain();
		$domainKey = substr($code, 0, 25) . "CONTUS";

		return $domainKey;

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

	public function genenrateOscdomain() {

		$strDomainName = $_SERVER['SERVER_NAME'];

		preg_match("/^(http:\/\/)?([^\/]+)/i", $strDomainName, $subfolder);
		preg_match("/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i", $subfolder[2], $matches);
		if (isset($matches['domain'])) {
			$customerurl = $matches['domain'];
		} else {
			$customerurl = "";
		}
		$customerurl = str_replace("www.", "", $customerurl);
		$customerurl = str_replace(".", "D", $customerurl);
		$customerurl = strtoupper($customerurl);
		if (isset($matches['domain'])) {
			$response = $this->domainKey($customerurl);
		} else {
			$response = "";
		}

		return $response;
	}

	public function getDealUrl() {
		return Mage::getBaseUrl().'deals';
	}

}

