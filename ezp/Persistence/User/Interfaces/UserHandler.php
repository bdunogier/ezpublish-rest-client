<?php
/**
 * File containing the UserHandler interface
 *
 * @copyright Copyright (C) 1999-2011 eZ Systems AS. All rights reserved.
 * @license http://www.gnu.org/licenses/gpl-2.0.txt GNU General Public License v2
 * @package ezp
 * @subpackage persistence_user
 */

namespace ezp\Persistence\User\Interfaces;

/**
 * Storage Engine handler for user module
 *
 * @package ezp
 * @subpackage persistence_user
 */
interface UserHandler
{

    /**
     * @param User $user
     */
    public function createUser( \ezp\Persistence\User\User $user );

    /**
     * @param int $userId
     */
    public function deleteUser( $userId );

    /**
     * @param User $user
     */
    public function updateUser( \ezp\Persistence\User\User $user );

    /**
     * @param Role $role
     * @return Role
     */
    public function createRole( \ezp\Persistence\User\Role $role );

    /**
     * @param Role $role
     */
    public function updateRole( \ezp\Persistence\User\Role $role );

    /**
     * @param int $roleId
     */
    public function deleteRole( $roleId );

    /**
     * @param int $userId
     * @return array
     */
    public function getPermissions( $userId );

    /**
     * @param int $contentId
     * @param int $roleId
     * @param $limitation
     * @todo Figure out which type $limitation has
     */
    public function assignRole( $contentId, $roleId, $limitation );

    /**
     * @param int $contentId
     * @param int $roleId
     */
    public function removeRole(  $contentId, $roleId );
}
?>