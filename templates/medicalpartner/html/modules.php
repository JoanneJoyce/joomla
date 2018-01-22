<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.medicalpartner
 * 
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt 
 * 
 * @author      Christopher Fabula
 */
defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg. To render a module mod_test in the submenu style, you would use the following include:
 * <jdoc:include type="module" name="test" style="submenu" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * two arguments.
 */

/*
 * Module chrome for rendering the module in a submenu
 */
function modChrome_no($module, &$params, &$attribs)
{
    $moduleClassSfx = $params->get('moduleclass_sfx', '');
    $moduleTag     = $params->get('module_tag', 'div');
	$bootstrapSize = (int) $params->get('bootstrap_size', 0);
	$moduleClass   = $bootstrapSize !== 0 ? ' span' . $bootstrapSize : '';
	$headerTag     = htmlspecialchars($params->get('header_tag', 'h3'), ENT_COMPAT, 'UTF-8');
	$headerClass   = htmlspecialchars($params->get('header_class', 'page-header'), ENT_COMPAT, 'UTF-8');

    if ($module->content)
	{
		echo '<' . $moduleTag . ' class="' . htmlspecialchars($moduleClassSfx, ENT_COMPAT, 'UTF-8') . $moduleClass . '" id="mpw-footer">';

			if ($module->showtitle)
			{
				echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
			}

			echo $module->content;
		echo '</' . $moduleTag . '>';
	}
}

function modChrome_blocks($module, &$params, &$attribs)
{
    $moduleClassSfx = $params->get('moduleclass_sfx', '');
    $moduleTag     = $params->get('module_tag', 'div');
	$bootstrapSize = (int) $params->get('bootstrap_size', 0);
	$moduleClass   = $bootstrapSize !== 0 ? ' span' . $bootstrapSize : '';
	$headerTag     = htmlspecialchars($params->get('header_tag', 'h3'), ENT_COMPAT, 'UTF-8');
	$headerClass   = htmlspecialchars($params->get('header_class', 'page-header'), ENT_COMPAT, 'UTF-8');

    if ($module->content)
	{
		echo '<' . $moduleTag . ' class="' . htmlspecialchars($moduleClassSfx, ENT_COMPAT, 'UTF-8') . $moduleClass . '">';
        echo '<div class="small-1 cell">&nbsp;</div>';
        echo '<div class="small-10 cell">';
            echo '<div class="mpw-block-head">&nbsp;</div>';
            echo '<div class="mpw-block-title">';
            if ($module->showtitle)
            {
                echo '<' . $headerTag . ' class="' . $headerClass . '">' . $module->title . '</' . $headerTag . '>';
            }
            echo '</div>';
            echo '<div class="mpw-block-body">';
            echo $module->content;
            echo '</div>';
            echo '<div class="mpw-block-footer">&nbsp;</div>';
        echo '</div>';
        echo '<div class="small-1 cell">&nbsp;</div>';
		echo '</' . $moduleTag . '>';
	}
}

function modChrome_nav($module, &$params, &$attribs)
{
    $moduleTag     = $params->get('module_tag', 'div');
    
    if ($module->content)
	{
		echo '<' . $moduleTag . '>';
            echo $module->content;
		echo '</' . $moduleTag . '>';
	}
}

?>