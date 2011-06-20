<?php
/**
 * Field map (DataMap) object
 *
 * @copyright Copyright (c) 2011, eZ Systems AS
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2.0
 * @package ext
 * @subpackage content
 */

/**
 * Fieldmap object for use by Content object
 *
 * @internal
 */
namespace ezx\content;
class FieldMap implements \Countable, \IteratorAggregate, \ArrayAccess
{
    /**
     * @var array Internal array of fields
     */
    private $elements = array();

    /**
     * @var int Pre generated count of elements (these never change so makes sense to store it)
     */
    private $count = 0;

    /**
     * Constructor, sets up Fieldmap based on current fields
     *
     * @todo Handle language
     * @param Content $content
     */
    public function __construct( ContentVersion $content )
    {
        foreach ( $content->getFields() as $field )
        {
            $this->elements[ $field->getContentTypeField()->identifier ] = $field;
            $this->count++;
        }
    }

    /**
     * Get Iterator.
     *
     * @return ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator( $this->elements );
    }

    /**
     * Overrides offsetSet to deal directly with Field Value object
     *
     * @throws \InvalidArgumentException
     * @param string $offset
     * @param mixed $value
     */
    public function offsetSet( $offset, $value )
    {
        throw new \InvalidArgumentException( "Setting fields is not supported on " . __CLASS__ );
    }

    /**
     * Overrides offsetGet to deal directly with Field Value object
     *
     * @param string $offset
     */
    public function offsetGet( $offset )
    {
        if ( isset($this->elements[$offset]) )
            return $this->elements[$offset];
        return null;
    }

    /**
     * Unset a key in array hash, but not supported on this class.
     *
     * @throws \InvalidArgumentException
     * @param string $offset
     */
    public function offsetUnset( $offset )
    {
        throw new \InvalidArgumentException( "Un-setting fields is not supported on " . __CLASS__ );
    }

    /**
     * Unset a key in array hash, but not supported on this class.
     *
     * @throws \InvalidArgumentException
     * @param string $offset
     */
    public function offsetExists ( $offset )
    {
        return isset( $this->elements[$offset] );
    }

    /**
     * Return count of elements
     *
     * @return int
     */
    public function count()
    {
        return $this->count;
    }
}