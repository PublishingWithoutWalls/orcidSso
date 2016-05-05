<?php

/**
 * @file plugins/generic/orcidSso/index.php
 *
 * Copyright (c) 2015-2016 University of Pittsburgh
 * Copyright (c) 2014-2016 Simon Fraser University Library
 * Copyright (c) 2003-2016 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * Wrapper for ORCID SSO plugin.
 * 
 * @package plugins.generic.orcidSso
 */

require_once('OrcidSsoPlugin.inc.php');

return new OrcidSsoPlugin();

?>
