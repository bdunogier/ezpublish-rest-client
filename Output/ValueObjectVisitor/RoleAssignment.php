<?php
/**
 * File containing the RoleAssignment ValueObjectVisitor class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Client\Output\ValueObjectVisitor;

use eZ\Publish\Core\REST\Common\Output\ValueObjectVisitor;
use eZ\Publish\Core\REST\Common\Output\Generator;
use eZ\Publish\Core\REST\Common\Output\Visitor;

/**
 * RoleAssignment value object visitor
 */
class RoleAssignment extends ValueObjectVisitor
{
    /**
     * Visit struct returned by controllers
     *
     * @param Visitor $visitor
     * @param Generator $generator
     * @param mixed $data
     * @return void
     */
    public function visit( Visitor $visitor, Generator $generator, $data )
    {
        $generator->startElement( 'RoleAssignInput' );
        $visitor->setHeader( 'Content-Type', $generator->getMediaType( 'RoleAssignInput' ) );

        $generator->startElement( 'Role' );

        $generator->startAttribute(
            'href',
            $this->urlHandler->generate( 'role', array( 'role' => $data->getRole()->id ) )
        );
        $generator->endAttribute( 'href' );

        $generator->endElement( 'Role' );

        $roleLimitation = $data->getRoleLimitation();
        if ( $roleLimitation !== null )
        {
            $visitor->visitValueObject( $roleLimitation );
        }

        $generator->endElement( 'RoleAssignInput' );
    }
}
