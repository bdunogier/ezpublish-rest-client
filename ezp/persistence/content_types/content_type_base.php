<?php
/**
 * File containing the ContentTypeBase class
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @package ezp
 * @subpackage persistence_content_types
 */

namespace ezp\persistence\content_types;

/**
 * @package ezp
 * @subpackage persistence_content_types
 */
class ContentTypeBase extends TypeBase
{
	/**
	 */
	public $created;
	/**
	 */
	public $modified;
	/**
	 */
	public $creator;
	/**
	 */
	public $modifier;
}
?>