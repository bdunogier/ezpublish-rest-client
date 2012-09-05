<?php
/**
 * File containing a ParserToolsTest class
 *
 * @copyright Copyright (C) 1999-2012 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @version //autogentag//
 */

namespace eZ\Publish\Core\REST\Client\Tests\Input;

use eZ\Publish\Core\REST\Client\Input\ParserTools;

class ParserToolsTest extends \PHPUnit_Framework_TestCase
{

    public function testCreateLoadingClosure()
    {
        $parserTools = $this->getParserTools();

        $serviceMock = $this->getMock( 'eZ\\Publish\\API\\Repository\\ContentService' );
        $serviceMock->expects( $this->once() )
            ->method( 'loadContent' )
            ->with(
                $this->equalTo( 23 ),
                $this->equalTo( null ),
                $this->equalTo( 5 )
            )->will( $this->returnValue( 'ServiceResultMock' ) );

        $loadingClosure = $parserTools->createLoadingClosure(
            $serviceMock,
            'loadContent',
            array(
                23, null, 5
            )
        );

        $this->assertTrue( is_callable( $loadingClosure ) );

        $this->assertEquals(
            'ServiceResultMock',
            $loadingClosure()
        );
    }

    public function testIsEmbeddedObjectReturnsTrue()
    {
        $parserTools = $this->getParserTools();

        $this->assertTrue(
            $parserTools->isEmbeddedObject(
                array(
                    '_href' => '/foo/bar',
                    '_media-type' => 'application/some-type',
                    'id' => 23,
                )
            )
        );
    }

    public function testIsEmbeddedObjectReturnsFalse()
    {
        $parserTools = $this->getParserTools();

        $this->assertFalse(
            $parserTools->isEmbeddedObject(
                array(
                    '_href' => '/foo/bar',
                    '_media-type' => 'application/some-type',
                )
            )
        );
    }

    protected function getParserTools()
    {
        return new ParserTools();
    }
}
