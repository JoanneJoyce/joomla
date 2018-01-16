<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.medicalpartner
 * 
 * @copyright   Copyright (C) 2018 Japan Inter Systems Co., Ltd. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/** @var JDocumentHtml $this */

$app  = JFactory::getApplication();
$user = JFactory::getUser();

// Output as HTML5
$this->setHtml5(true);

// Getting params from template
$params = $app->getTemplate(true)->params;

// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');

if ($task === 'edit' || $layout === 'form') {
    $fullWidth = 1;
} else {
    $fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

// Add template js
JHtml::_('script', 'template.js', array('version' => 'auto', 'relative' => true));

// Add html5 shiv
JHtml::_('script', 'jui/html5.js', array('version' => 'auto', 'relative' => true, 'conditional' => 'lt IE 9'));

// Add Stylesheets
JHtml::_('stylesheet', 'template.css', array('version' => 'auto', 'relative' => true));
JHtml::_('stylesheet', 'foundation.min.css', array('version' => 'auto', 'relative' => true));

// Use of Google Font
if ($this->params->get('googleFont')) {
    JHtml::_('stylesheet', '//fonts.googleapis.com/css?family=' . $this->params->get('googleFontName'));
    $this->addStyleDeclaration("
        h1, h2, h3, h4, h5, h6, .site-title {
            font-family: '" . str_replace('+', ' ', $this->params->get('googleFontName')) . "', sans-serif;
    }");
}

// Template color
if ($this->params->get('templateColor')) {
    $this->addStyleDeclaration('
        body.site {
            border-top: 3px solid ' . $this->params->get('templateColor') . ';
            background-color: ' . $this->params->get('templateBackgroundColor') . ';
        }
        a {
            color: ' . $this->params->get('templateColor') . ';
        }
    ');
}

// Logo file or site title param
if ($this->params->get('logoFile')) {
    $logo = '<img src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
} elseif ($this->params->get('sitetitle')) {
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle'), ENT_COMPAT, 'UTF-8') . '</span>';
} else {
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}
?>
<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <jdoc:include type="head" />
</head>
<body>
    <?php 
    // <body class="site">
    // echo $option
    // . ' view-' . $view
    // . ($layout ? ' layout-' . $layout : ' no-layout')
    // . ($task ? ' task-' . $task : ' no-task')
    // . ($itemid ? ' itemid-' . $itemid : '')
    // . ($params->get('fluidContainer') ? ' fluid' : '');
    ?><!--">-->
    <div class="grid-container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
        <header id="mpw-header">
            <div class="grid-x" id="mpw-navi">
                <div class="large-12 cell" id="mpw-prompt">
                    <?php if ($user->username) : ?>
                        <img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/userinfo.png">&nbsp;<span><?php echo $user->name; ?></span>&nbsp;さん
                    <?php else : ?>
                        ユーザーＩＤ・パスワードを入力してログインして下さい
                    <?php endif; ?>
                </div>
                <nav class="large-12 cell" id="mpw-nav">
                    <jdoc:include type="modules" name="nav" />
                </nav>
            </div>
        </header>
        <main class="grid-x">
            <aside class="large-2 cell">
                <jdoc:include type="modules" name="left-sidebar" />
            </aside>
            <section class="cell auto">
                <!-- <jdoc:include type="component" /> -->
                <jdoc:include type="modules" name="center-left" />
                <jdoc:include type="modules" name="center" />
                <jdoc:include type="modules" name="center-right" />
            </section>
            <aside class="large-2 cell">
                <jdoc:include type="modules" name="right-sidebar" />
            </aside>
        </main>
        <footer class="grid-x" id="mpw-footer">
            <div class="cell auto">
                <img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/mpw_logo.gif" alt="MedicalPartner" />
                <img src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/img/copyright.png" width="350" height="14" alt="NIHON INTER SYSTEMS" />
            </div>
        </footer>
    </div>
    <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/vendor/jquery.js"></script>
    <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/vendor/what-input.js"></script>
    <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/vendor/foundation.js"></script>
    <script src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template; ?>/js/app.js"></script>
</body>
</html>