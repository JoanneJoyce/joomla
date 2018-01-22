<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_login
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Get application object
$app = JFactory::getApplication();
$templatePath = JURI::base(true) . '/templates/' . $app->getTemplate();

JLoader::register('UsersHelperRoute', JPATH_SITE . '/components/com_users/helpers/route.php');

JHtml::_('behavior.keepalive');
JHtml::_('bootstrap.tooltip');

?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" class="form-inline">
<div class="userdata">
    <div class="grid-x"><div class="small-12 cell">&nbsp;</div></div>
    <div class="grid-x">
        <div class="small-1 cell"></div>
        <div class="small-10 cell">ユーザＩＤ</div>
        <div class="small-1 cell"></div>
    </div>
    <div id="form-login-username" class="grid-x">
        <div class="small-1 cell"></div>
        <div class="small-10 cell">
            <div class="input-group mpw-login-field">
                <span class="input-group-label"><img src="<?php echo $templatePath; ?>/images/userinfo.png"></span>
                <input id="modlgn-username" type="text" name="username" class="input-group-field" size="18" placeholder="<?php echo JText::_('MOD_LOGIN_VALUE_USERNAME'); ?>" autocomplete="off"/>
            </div>
        </div>
        <div class="small-1 cell"></div>
    </div>
    <div class="grid-x"><div class="small-12 cell">&nbsp;</div></div>
    <div class="grid-x">
        <div class="small-1 cell"></div>
        <div class="small-10 cell">パスワード</div>
        <div class="small-1 cell"></div>
    </div>
    <div class="grid-x">
        <div class="small-1 cell"></div>
        <div class="small-10 cell">
            <div class="input-group mpw-login-field">
                <span class="input-group-label"><img src="<?php echo $templatePath; ?>/images/password.png"></span>
                <input id="modlgn-passwd" type="password" name="password" class="input-group-field" tabindex="0" size="18" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD'); ?>"  autocomplete="off"/>
            </div>
        </div>
        <div class="small-1 cell"></div>
    </div>
    <div class="grid-x">
        <div class="small-1 cell"></div>
        <div class="small-10 cell login-button">
            <button type="submit" tabindex="0" name="Submit" class="formButton">ログイン</button>
        </div>
        <div class="small-1 cell"></div>
    </div>
    <div class="grid-x"><div class="small-12 cell">&nbsp;</div></div>
    <div class="grid-x">
        <div class="small-12 cell">
            <hr class="separator" size="1">
        </div>
    </div>
    <div class="grid-x"><div class="small-12 cell">&nbsp;</div></div>
    <div class="grid-x">
        <div class="small-12 cell lost-pass">
            <a href="<?php echo JURI::base(true); ?>/index.php/lost-password">パスワード紛失</a>
        </div>
    </div>
    <div class="grid-x"><div class="small-12 cell">&nbsp;</div></div>
    <?php
        $usersConfig = JComponentHelper::getParams('com_users'); ?>
    <input type="hidden" name="option" value="com_users" />
    <input type="hidden" name="task" value="user.login" />
    <input type="hidden" name="return" value="<?php echo $return; ?>" />
    <?php echo JHtml::_('form.token'); ?>
</div>
</form>
