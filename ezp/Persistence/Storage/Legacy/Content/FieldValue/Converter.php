<?php
/**
 * File containing the FieldValue Converter base class
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 *
 */

namespace ezp\Persistence\Storage\Legacy\Content\FieldValue;

use ezp\Persistence\Content\FieldValue,
    ezp\Persistence\Storage\Legacy\Content\StorageFieldValue;

/**
 * Converter for field values in legacy storage
 */
abstract class Converter
{
    /**
     * Converts $value to a StorageFieldValue
     *
     * @param FieldValue $value
     * @return StorageFieldValue
     */
    abstract public function toStorage( FieldValue $value );

    /**
     * Converts $value to a FieldValue
     *
     * @param StorageFieldValue $value
     * @return FieldValue
     */
    abstract public function toFieldValue( StorageFieldValue $value );
}