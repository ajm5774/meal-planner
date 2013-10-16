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
	 * @param string $html
	 * @return string
	 */
	public function center($html){
		return '<center>' . $html . '</center>';
	}
}