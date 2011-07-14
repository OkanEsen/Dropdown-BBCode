<?php
require_once(WCF_DIR.'lib/data/message/bbcode/BBCodeParser.class.php');
require_once(WCF_DIR.'lib/data/message/bbcode/BBCode.class.php');

/**
 * Parses the [option] bbcode tag.
 * 
 * @author	Okan "[PixeL]" Esen
 * @copyright	2011 www.okan-esen.de
 * @license	Creative Commons Attribution-Noncommercial-Share Alike 3.0 Unported
 * @package	de.okanesen.wcf.data.message.bbcode.option
 */
class OptionBBCode implements BBCode {
	/**
	 * @see BBCode::getParsedTag()
	 */
	public function getParsedTag($openingTag, $content, $closingTag, BBCodeParser $parser) {
		if ($parser->getOutputType() == 'text/html') {
			$fontColor = (isset($openingTag['attributes'][0])) ? $openingTag['attributes'][0] : NULL;
			$backgroundColor = (isset($openingTag['attributes'][1])) ? $openingTag['attributes'][1] : NULL;
			$optionURL = (isset($openingTag['attributes'][2])) ? $openingTag['attributes'][2] : NULL;
			
			$styleAttribute = '';
			if ($fontColor) {
				if (!empty($styleAttribute)) $styleAttribute .= ';';
				$styleAttribute .= 'color: '.$fontColor;
			}
			if ($backgroundColor) {
				if (!empty($styleAttribute)) $styleAttribute .= ';';
				$styleAttribute .= 'background-color: '.$backgroundColor;
			}
			
			$linkAttribute = '';
			if ($optionURL) $linkAttribute = ($optionURL) ? $optionURL : 0;

			
			return "<option value='".$linkAttribute."'"  .(empty($styleAttribute) ? "" : " style='".$styleAttribute."'").">".$content."</option>";
		}
		else if ($parser->getOutputType() == 'text/plain') {
			return "*option*".$content."*option*";
		}

	}
}
?>