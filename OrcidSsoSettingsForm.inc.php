<?php

/**
 * @file plugins/generic/orcidSso/OrcidSsoSettingsForm.inc.php
 *
 * Copyright (c) 2015-2016 University of Pittsburgh
 * Copyright (c) 2014-2016 Simon Fraser University Library
 * Copyright (c) 2003-2016 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @class OrcidSsoSettingsForm
 * @ingroup plugins_generic_orcidSso
 *
 * @brief Form for site admins to modify ORCID SSO plugin settings
 */


import('lib.pkp.classes.form.Form');

class OrcidSsoSettingsForm extends Form {

	/** @var $journalId int */
	var $journalId;

	/** @var $plugin object */
	var $plugin;

	/**
	 * Constructor
	 * @param $plugin object
	 * @param $journalId int
	 */
	function OrcidSsoSettingsForm(&$plugin, $journalId) {
		$this->journalId = $journalId;
		$this->plugin =& $plugin;

		parent::Form($plugin->getTemplatePath() . 'settingsForm.tpl');

		$this->addCheck(new FormValidator($this, 'orcidProfileAPIPath', 'required', 'plugins.generic.orcidSso.manager.settings.orcidAPIPathRequired'));
	}

	/**
	 * Initialize form data.
	 */
	function initData() {
		$journalId = $this->journalId;
		$plugin =& $this->plugin;

		$this->_data = array(
			'orcidProfileAPIPath' => $plugin->getSetting($journalId, 'orcidProfileAPIPath'),
			'orcidClientId' => $plugin->getSetting($journalId, 'orcidClientId'),
			'orcidClientSecret' => $plugin->getSetting($journalId, 'orcidClientSecret'),
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
		$journalId = $this->journalId;

		$plugin->updateSetting($journalId, 'orcidProfileAPIPath', trim($this->getData('orcidProfileAPIPath'), "\"\';"), 'string');
		$plugin->updateSetting($journalId, 'orcidClientId', $this->getData('orcidClientId'), 'string');
		$plugin->updateSetting($journalId, 'orcidClientSecret', $this->getData('orcidClientSecret'), 'string');
	}
}

?>
