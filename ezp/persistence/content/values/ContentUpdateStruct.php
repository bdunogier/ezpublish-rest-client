<?php
/**
 * File containing the ContentUpdateStruct struct
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 *
 */

namespace ezp\persistence\content\values;

/**
 * @package ezp.persistence.content.values
 */
class ContentUpdateStruct 
{
	/**
	 */
	public $sectionId;
	/**
	 */
	public $userId;
	/**
	 */
	public $newParents;
	/**
	 */
	public $removeLocations;
	/**
	 */
	public $fields = array();
}
?>