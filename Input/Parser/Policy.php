<?php
/**
 * File containing the Policy parser class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Client\Input\Parser;

use eZ\Publish\Core\REST\Common\Input\Parser;
use eZ\Publish\Core\REST\Common\Input\ParsingDispatcher;

use eZ\Publish\Core\REST\Client;
use eZ\Publish\API\Repository\Values\User\Limitation;

/**
 * Parser for Policy
 */
class Policy extends Parser
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
        $limitations = array();

        if ( array_key_exists( 'limitations', $data ) )
        {
            foreach ( $data['limitations']['limitation'] as $limitation )
            {
                $limitationObject = $this->getLimitationByIdentifier( $limitation['_identifier'] );

                $limitationValues = array();
                foreach ( $limitation['values']['ref'] as $limitationValue )
                {
                    $limitationValues[] = $limitationValue['_href'];
                }

                $limitationObject->limitationValues = $limitationValues;
                $limitations[] = $limitationObject;
            }
        }

        return new Client\Values\User\Policy(
            array(
                'id' => $data['id'],
                'module' => $data['module'],
                'function' => $data['function'],
                'limitations' => $limitations
            )
        );
    }

    /**
     * Instantiates Limitation object based on identifier
     *
     * @param string $identifier
     * @return \eZ\Publish\API\Repository\Values\User\Limitation
     */
    protected function getLimitationByIdentifier( $identifier )
    {
        switch ( $identifier )
        {
            case Limitation::CONTENTTYPE:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\ContentTypeLimitation();

            case Limitation::LANGUAGE:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\LanguageLimitation();

            case Limitation::LOCATION:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\LocationLimitation();

            case Limitation::OWNER:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\OwnerLimitation();

            case Limitation::PARENTOWNER:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\ParentOwnerLimitation();

            case Limitation::PARENTCONTENTTYPE:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\ParentContentTypeLimitation();

            case Limitation::PARENTDEPTH:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\ParentDepthLimitation();

            case Limitation::SECTION:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\SectionLimitation();

            case Limitation::SITEACCESS:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\SiteaccessLimitation();

            case Limitation::STATE:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\StateLimitation();

            case Limitation::SUBTREE:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\SubtreeLimitation();

            case Limitation::USERGROUP:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\UserGroupLimitation();

            case Limitation::PARENTUSERGROUP:
                return new \eZ\Publish\API\Repository\Values\User\Limitation\ParentUserGroupLimitation();
        }

        return new \eZ\Publish\API\Repository\Values\User\Limitation\CustomLimitation( $identifier );
    }
}
