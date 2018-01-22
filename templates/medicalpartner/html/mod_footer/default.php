<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_footer
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * 
 * @author      Christopher Fabula
 */

defined('_JEXEC') or die;

// Get application object
$app = JFactory::getApplication();
$templatePath = JURI::base(true) . '/templates/' . $app->getTemplate();

?>
<div class="cell">
    <img src="<?php echo $templatePath; ?>/images/mpw_logo.gif" alt="MedicalPartner" />
    <img src="<?php echo $templatePath; ?>/images/copyright.png" width="350" height="14" alt="NIHON INTER SYSTEMS" />
</div>