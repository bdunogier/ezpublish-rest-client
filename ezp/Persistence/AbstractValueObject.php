<?php
/**
 * File containing the AbstractValueObject class
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 *
 */

namespace ezp\Persistence;

/**
 * @package ezp
 * @subpackage persistence
 */
abstract class AbstractValueObject
{
    /**
     * Construct object optionally with set of properties
     *
     * @param array $properties
     */
    public function __construct( array $properties = array() )
    {
        foreach ( $properties as $property => $value )
            $this->$property = $value;
    }

    /**
     * Throws exception on all writes to undefined properties so typos are not silently accepted.
     *
     * @throws \ezp\Base\Exception\PropertyNotFound
     * @param string $name
     * @param string $value
     * @return void
     */
    public function __set( $name, $value )
    {
        throw new \ezp\Base\Exception\PropertyNotFound( $name, get_class( $this ) );
    }

    /**
     * Throws exception on all reads to undefined properties so typos are not silently accepted.
     *
     * @throws \ezp\Base\Exception\PropertyNotFound
     * @param string $name
     * @return void
     */
    public function __get( $name )
    {
        throw new \ezp\Base\Exception\PropertyNotFound( $name, get_class( $this ) );
    }
}
?>