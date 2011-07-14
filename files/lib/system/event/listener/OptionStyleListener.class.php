<?php
// wcf imports
require_once(WCF_DIR.'lib/system/event/EventListener.class.php');

/**
 * @author	Okan "[PixeL]" Esen
 * @copyright	2011 www.okan-esen.de
 * @license	Creative Commons Attribution-Noncommercial-Share Alike 3.0 Unported
 * @package	de.okanesen.wcf.data.message.bbcode.dropdown
 */
class OptionStyleListener implements EventListener {
	
	/**
	 * @see EventListener::execute()
	 */
	public function execute($eventObj, $className, $eventName) {	

			WCF::getTPL()->append("specialStyles",WCF::getTPL()->fetch("optionBBCodeStyle"));
	}
}
?>