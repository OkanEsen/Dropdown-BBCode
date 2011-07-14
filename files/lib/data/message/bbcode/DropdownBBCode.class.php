<?php
require_once(WCF_DIR.'lib/data/message/bbcode/BBCodeParser.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/BBCode.class.php');

/**
 * Parses the [dropdown] bbcode tag.
 * 
 * @author	Okan "[PixeL]" Esen
 * @copyright	2011 www.okan-esen.de
 * @license	Creative Commons Attribution-Noncommercial-Share Alike 3.0 Unported
 * @package	de.okanesen.wcf.data.message.bbcode.dropdown
 */
class DropdownBBCode implements BBCode {
	/**
	 * @see BBCode::getParsedTag()
	 */
	public function getParsedTag($openingTag, $content, $closingTag, BBCodeParser $parser) {
		if ($parser->getOutputType() == 'text/html') {
			$quickJumpTitle = (isset($openingTag['attributes'][0])) ? $openingTag['attributes'][0] : (WCF::getLanguage()->get("wbb.board.quickJump.title"));
			
			return '<select onChange="if (this.options[this.selectedIndex].value != 0) goTo(\'parent\',this,1);">
			<option value="0">'.$quickJumpTitle.'</option>
			<option value="0">-----------------------</option>
			'.$content.'</select>';
		}
		else if ($parser->getOutputType() == 'text/plain') {
			return "*dropdown*".$content."*dropdown*";
		}

	}
}
?>