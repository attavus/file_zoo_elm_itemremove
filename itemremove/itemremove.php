<?php
/*************************
* @package   ZOO Component
* @file      itemremove.php
* @version   3.3.0 March 2015
* @author    Attavus M.D. http://www.raslab.org
* @copyright Copyright (C) 2013-2015 R.A.S.Lab[.org]
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*******************************************************************/

// no direct access
defined('_JEXEC') or die('Restricted access');

/*
  Class: ElementItemRemove
     the itemremove element class
*/
class ElementItemRemove extends Element {	

	/*
		Function: hasValue
			Override. Checks if the element's value is set.

	   Parameters:
			$params - AppData render parameter

		Returns:
			Boolean - true, on success
	*/
	public function hasValue($params = array()) {
		// Check if the user can access the sub itself and if an item edit submission is set
        return $this->_item && ($this->_item->canEdit());
	}

	/*
		Function: render
			Renders the element.

	   Parameters:
            $params - AppData render parameter

		Returns:
			String - html
	*/
	public function render($params = array()) {
		// init vars
		$item = $this->getItem();
		$submission_id = null;
		// get submission
		$submissions = $item->getApplication()->getSubmissions();
		if(!empty($submissions)) {
			foreach($submissions as $submission) {
				$types = $submission->getSubmittableTypes();
				if($submission->isInTrustedMode() && $types[$item->type]) {
					$submission_id = $submission->id;
					//echo print_r(json_encode($submission));
				}										
			}		
		}
		// render layout
		if ($layout = $this->getLayout()) {	
			return $this->renderLayout($layout, array(
				'item_id' => $item->id,
				'submission_id' => $submission_id
				)
			);			
		}
	}
	
	/*
	   Function: edit
	       Renders the edit form field.

	   Returns:
	       String - html
	*/
	public function edit() {
		return null;
	}	
}
