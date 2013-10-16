<?php
/**
 * This class should contain functions for generating html widgets
 *
 * @author - Andrew Mueller
 */
class WidgetHelper extends FormHelper
{
	/**
	 * Wraps the html text with center tags
	 *
	 * @param string $content - html content to be centered
	 * @return string
	 */
	public function center($content){
		return '<center>' . $content . '</center>';
	}
}