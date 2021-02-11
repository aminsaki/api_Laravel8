<?php
/**
 * Created by PhpStorm.
 * User: amin
 * Date: 2/11/2021
 * Time: 3:08 AM
 */

namespace App\Respostroy;


interface InterfaceUser
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @return mixed
     */
    public function create( array $itme);

    /**
     * @return mixed
     */
    public function delete($id);

    /**
     * @return mixed
     */
    public function update( array $itme);

    /**
     * @return mixed
     */
    public function show( $id );

}