<?php

/**
 * @defgroup plugins_generic_orcidSso
 */
 
/**
 * @file plugins/generic/orcidSso/index.php
 *
 * Copyright (c) 2015-2016 University of Pittsburgh
 * Copyright (c) 2014-2016 Simon Fraser University Library
 * Copyright (c) 2003-2016 John Willinsky
 * Distributed under the GNU GPL v2. For full terms see the file docs/COPYING.
 *
 * @ingroup plugins_generic_orcidSso
 * @brief Wrapper for ORCID SSO plugin.
 *
 */

require_once('OrcidSsoPlugin.inc.php');

return new OrcidSsoPlugin();

?>
