<?php
/**
 * File containing a test class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\API\REST\Client\Tests\Input\Parser;

use eZ\Publish\API\REST\Client\Input\Parser;

class NotFoundExceptionTest extends BaseTest
{
    /**
     * @return void
     * @expectedException \eZ\Publish\API\Repository\Exceptions\NotFoundException
     * @expectedExceptionMessage Section with ID "23" not found.
     */
    public function testParse()
    {
        $parser = $this->getParser();

        $inputArray = array(
            'errorDescription' => 'Section with ID "23" not found.',
            'errorCode'        => '404',
        );

        $result = $parser->parse( $inputArray, $this->getParsingDispatcherMock() );
    }

    /**
     * @return eZ\Publish\API\REST\Client\Input\Parser\NotFoundException;
     */
    protected function getParser()
    {
        return new Parser\ErrorMessage();
    }
}
