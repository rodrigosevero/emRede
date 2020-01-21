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
define('UNIREDE_LOGO_URL', 'images/logo_unirede.png');
define('CREATIVE_COMMONS_LOGO_URL', 'images/cc_logo.png');

class DefaultChildThemePlugin extends ThemePlugin {
	/**
	 * Initialize the theme's styles, scripts and hooks. This is only run for
	 * the currently active theme.
	 *
	 * @return null
	 */
	public function init() {

        HookRegistry::register('TemplateManager::display', array($this, 'loadAdditionalData'));
		$this->setParent('defaultthemeplugin');
        $this->addStyle('child-stylesheet', 'styles/emRede.less');
        $this->addStyle('editorial-stylesheet', 'styles/emRedeEditorial.less', array( 'contexts' => 'backend' ));
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

    public function loadAdditionalData($hookName, $args) {
		$smarty = $args[0];

		$request = Application::getRequest();
		$context = $request->getContext();

		if (!defined('SESSION_DISABLE_INIT')) {

			// Get possible locales
			if ($context) {
				$locales = $context->getSupportedLocaleNames();
			} else {
				$locales = $request->getSite()->getSupportedLocaleNames();
			}

			$uniredeLogoUrl = "/". $this->getPluginPath() . '/' . UNIREDE_LOGO_URL;
			$creativeCommonsLogoUrl = "/". $this->getPluginPath() . '/' . CREATIVE_COMMONS_LOGO_URL;

			$smarty->assign(array(
				'languageToggleLocales' => $locales,
				'uniredeLogoUrl' =>  $uniredeLogoUrl,
				'creativeCommonsLogoUrl' =>  $creativeCommonsLogoUrl,
			));
		}
	}



}
?>
