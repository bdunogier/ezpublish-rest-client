<?php
/**
 * File containing the ContentTypeGateway class
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace ezp\Persistence\LegacyStorage\Content\Type;
use ezp\Persistence\Content\Type\ContentTypeCreateStruct,
    ezp\Persistence\Content\Type\FieldDefinition;

/**
 * Base class for content type gateways.
 */
abstract class ContentTypeGateway
{
    /**
     * Inserts a new conten type.
     *
     * @param ContentTypeCreateStruct $createStruct
     * @return mixed Type ID
     */
    abstract public function insertType( ContentTypeCreateStruct $createStruct );

    /**
     * Insert assignement of $typeId to $groupId.
     *
     * @param mixed $typeId
     * @param mixed $groupId
     * @return void
     */
    abstract public function insertGroupAssignement( $typeId, $groupId );

    /**
     * Inserts a $fieldDefinition for $typeId.
     *
     * @param mixed $typeId
     * @param FieldDefinition $fieldDefinition
     * @return mixed Field definition ID
     */
    abstract public function insertFieldDefinition( $typeId, FieldDefinition $fieldDefinition );
}