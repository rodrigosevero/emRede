<?php

/**
 * @file plugins/themes/default/DefaultChildThemePlugin.inc.php
 *
 * Copyright (c) 2014-2016 Simon Fraser University Library
 * Copyright (c) 2003-2016 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class DefaultChildThemePlugin
 * @ingroup plugins_themes_default
 *
 * @brief Default theme
 */
import('lib.pkp.classes.plugins.ThemePlugin');

class DefaultChildThemePlugin extends ThemePlugin {
	/**
	 * Initialize the theme's styles, scripts and hooks. This is only run for
	 * the currently active theme.
	 *
	 * @return null
	 */
	public function init() {
        HookRegistry::register ('TemplateManager::display', array($this, 'loadTemplateData'));
		$this->setParent('defaultthemeplugin');
		 $this->addStyle('child-stylesheet', 'styles/emRede.less');
	}

	/**
	 * Get the display name of this plugin
	 * @return string
	 */
	function getDisplayName() {
		return __('plugins.themes.default-child.name');
	}

	/**
	 * Get the description of this plugin
	 * @return string
	 */
	function getDescription() {
		return __('plugins.themes.default-child.description');
    }
    
    public function loadTemplateData($hookName, $args) {
        $templateMgr = $args[0];
		
			
                $uniredeLogo=$this->getPluginPath().'/templates/images/88x31.png';
			

			$templateMgr->assign('myCustomData', $uniredeLogo);
		
       
       
	}

}
?>
