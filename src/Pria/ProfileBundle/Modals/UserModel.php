<?php
/**
 * Created by PhpStorm.
 * User: Emrah
 * Date: 19.08.2014
 * Time: 11:57
 */

namespace Pria\ProfileBundle\Modals;


class UserModel {
    private $id;
    private $username;
    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

} 