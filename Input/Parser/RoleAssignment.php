<?php
/**
 * File containing the RoleAssignment parser class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Client\Input\Parser;

use eZ\Publish\Core\REST\Common\Input\Parser;
use eZ\Publish\Core\REST\Common\Input\ParsingDispatcher;
use eZ\Publish\Core\Repository\Values\User\Limitation\RoleLimitation;

use eZ\Publish\Core\REST\Client;

/**
 * Parser for RoleAssignment
 */
class RoleAssignment extends Parser
{
    /**
     * Parse input structure
     *
     * @param array $data
     * @param ParsingDispatcher $parsingDispatcher
     * @return ValueObject
     * @todo Error handling
     */
    public function parse( array $data, ParsingDispatcher $parsingDispatcher )
    {
        $roleLimitation = null;
        if ( array_key_exists( 'limitation', $data ) )
        {
            $limitation = $parsingDispatcher->parse( $data['limitation'], $data['limitation']['_media-type'] );
            $roleLimitation = RoleLimitation::createRoleLimitation( $limitation->getIdentifier() );
            $roleLimitation->limitationValues = $limitation->limitationValues;
        }

        return new Client\Values\User\RoleAssignment(
            array(
                'role' => $parsingDispatcher->parse( $data['Role'], $data['Role']['_media-type'] ),
                'limitation' => $roleLimitation
            )
        );
    }
}
