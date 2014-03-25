/**
 * @name : Super Deals
 * @version : 1.1
 * @author : Apptha - http://www.apptha.com
 * @copyright : Copyright (C) 2013 Powered by Apptha
 * @license : http://opensource.org/licenses/osl-3.0.php Open Software License
 *          (OSL 3.0)
 * @Creation Month : April 2013
 * 
 */

var j = 1;
if (typeof (BackColor) == "undefined")
	BackColor = "white";
if (typeof (ForeColor) == "undefined")
	ForeColor = "black";
if (typeof (DisplayFormat) == "undefined")
	DisplayFormat = "<span class='day'>%%D%%</span><span class='day_label'>Days</span><span class='hour'>%%H%%</span><span class='sep'>:</span><span class='min'>%%M%%</span><span class='sep'>:</span><span class='sec'>%%S%% </span>";
if (typeof (CountActive) == "undefined")
	CountActive = true;
if (typeof (FinishMessage) == "undefined")
	FinishMessage = "";
if (typeof (CountStepper) != "number")
	CountStepper = -1;
if (typeof (LeadingZero) == "undefined")
	LeadingZero = true;
CountStepper = Math.ceil(CountStepper);
if (CountStepper == 0)
	CountActive = false;
var SetTimeOutPeriod = (Math.abs(CountStepper) - 1) * 1000 + 990;
function calcage(secs, num1, num2) {
	s = ((Math.floor(secs / num1) % num2)).toString();
	if (LeadingZero && s.length < 2)
		s = "0" + s;
	return s;
}
function CountBack(secs, iid, j) {
	// if (secs < 0) {
	// document.getElementById(iid).innerHTML = FinishMessage;
	// document.getElementById('caption'+j).style.display = "none";
	// document.getElementById('heading'+j).style.display = "none";
	// return;
	// }
	DisplayStr = DisplayFormat.replace(/%%D%%/g, calcage(secs, 86400, 100000));
	DisplayStr = DisplayStr.replace(/%%H%%/g, calcage(secs, 3600, 24));
	DisplayStr = DisplayStr.replace(/%%M%%/g, calcage(secs, 60, 60));
	DisplayStr = DisplayStr.replace(/%%S%%/g, calcage(secs, 1, 60));
	document.getElementById(iid).innerHTML = DisplayStr;
	if (CountActive)
		setTimeout(function() {
			CountBack((secs + CountStepper), iid, j)
		}, SetTimeOutPeriod);

}
