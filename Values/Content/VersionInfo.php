<?php
/**
 * File containing the VersionInfo class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Client\Values\Content;


/**
 * Implementation of the {@link \eZ\Publish\API\Repository\Values\Content\VersionInfo}
 * class.
 *
 * @see \eZ\Publish\API\Repository\Values\Content\VersionInfo
 * @property-read mixed $contentId The id of the corresponding content object.
 */
class VersionInfo extends \eZ\Publish\API\Repository\Values\Content\VersionInfo
{
    /**
     * @var \eZ\Publish\API\Repository\Repository
     */
    protected $repository;

    /**
     * @var integer
     */
    protected $contentId;

    public function __construct( array $properties = array() )
    {
        parent::__construct( $properties );

        if ( $properties['status'] > 2 ) {
            echo "\nalert(", $properties['contentId'], ")\n";
            $trace = debug_backtrace();
            echo $trace[0]['file'], ' +', $trace[0]['line'], PHP_EOL;
        }
    }


    /**
     * Content of the content this version belongs to.
     *
     * @return ContentInfo
     */
    public function getContentInfo()
    {
        return $this->repository->getContentService()->loadContentInfo( $this->contentId );
    }

    /**
     *
     * Returns the names computed from the name schema in the available languages.
     *
     * @return string[]
     */
    public function getNames()
    {
        // TODO: Implement getNames() method.
    }

    /**
     *
     * Returns the name computed from the name schema in the given language.
     * If no language is given the name in initial language of the version if present, otherwise null.
     *
     * @param string $languageCode
     *
     * @return string
     */
    public function getName( $languageCode = null )
    {
        // TODO: Implement getName() method.
    }

    public function __get( $property )
    {
        switch ( $property )
        {
            case 'contentInfo':
                return $this->getContentInfo();
        }

        return parent::__get( $property );
    }
}
