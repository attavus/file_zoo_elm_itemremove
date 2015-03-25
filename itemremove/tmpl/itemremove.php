<?php
/*************************
* @package   ZOO Component
* @file      itemremove.php
* @version   3.3.0 March 2015
* @author    Attavus M.D. http://www.raslab.org
* @copyright Copyright (C) 2013-2015 R.A.S.Lab[.org]
* @license   http://opensource.org/licenses/GPL-2.0 GNU/GPLv2 only
*****************************************************************/

// no direct access
defined('_JEXEC') or die('Restricted access');		
?>

<?php if($this->canAccess() && !empty($submission_id)) : ?>
	<a href="javascript: if(confirm('Are you sure you want to remove this item?')) { window.location='<?php echo $this->app->link(array('controller' => 'submission', 'submission_id' => $submission_id, 'task' => 'remove', 'item_id' => $item_id, 'Itemid' => $this->app->menu->getActive()->id)); ?>';}" title="<?php echo JText::_('Remove Item'); ?>" class="item-icon remove-item">
		<img src="<?php echo JRoute::_($this->app->path->url('assets:images/delete.png')); ?>" width="16" height="16" alt="<?php echo JText::_('Remove Item'); ?>" />
	</a>
<?php endif;
