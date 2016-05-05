<?php

/**
 * @file plugins/generic/orcidSso/OrcidSsoSettingsForm.inc.php
 *
 * Copyright (c) 2015-2016 University of Pittsburgh
 * Copyright (c) 2014-2016 Simon Fraser University Library
 * Copyright (c) 2003-2016 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @package plugins.generic.orcidSso
 * @class OrcidSsoSettingsForm
 *
 * Form for site admins to modify ORCID SSO plugin settings
 */


import('lib.pkp.classes.form.Form');

class OrcidSsoSettingsForm extends Form {

	/** @var $contextId int */
	var $contextId;

	/** @var $plugin object */
	var $plugin;

	/**
	 * Constructor
	 * @param $plugin object
	 * @param $contextId int
	 */
	function OrcidSsoSettingsForm(&$plugin, $contextId) {
		$this->contextId = $contextId;
		$this->plugin =& $plugin;

		parent::Form($plugin->getTemplatePath() . 'settingsForm.tpl');

		$this->addCheck(new FormValidator($this, 'orcidProfileAPIPath', 'required', 'plugins.generic.orcidSso.manager.settings.orcidAPIPathRequired'));
	}

	/**
	 * Initialize form data.
	 */
	function initData() {
		$contextId = $this->contextId;
		$plugin =& $this->plugin;

		$this->_data = array(
			'orcidProfileAPIPath' => $plugin->getSetting($contextId, 'orcidProfileAPIPath'),
			'orcidClientId' => $plugin->getSetting($contextId, 'orcidClientId'),
			'orcidClientSecret' => $plugin->getSetting($contextId, 'orcidClientSecret'),
		);
	}

	/**
	 * Assign form data to user-submitted data.
	 */
	function readInputData() {
		$this->readUserVars(array('orcidProfileAPIPath'));
		$this->readUserVars(array('orcidClientId'));
		$this->readUserVars(array('orcidClientSecret'));
	}

	/**
	 * Save settings.
	 */
	function execute() {
		$plugin =& $this->plugin;
		$contextId = $this->contextId;

		$plugin->updateSetting($contextId, 'orcidProfileAPIPath', trim($this->getData('orcidProfileAPIPath'), "\"\';"), 'string');
		$plugin->updateSetting($contextId, 'orcidClientId', $this->getData('orcidClientId'), 'string');
		$plugin->updateSetting($contextId, 'orcidClientSecret', $this->getData('orcidClientSecret'), 'string');
	}
}

?>
