<?php
    /**
     **************************************************************************
     * sanitize.php
     * Sanitize Solutions
     **************************************************************************
     * @package          Mahan 4
     * @category         Core library
     * @author           Milad Abooali <m.abooali@hotmail.com>
     * @copyright        2012 - 2021 (c) Codebox
     * @license          https://codebox.ir/cbl  CBL v1.0
     **************************************************************************
     * @version          1.0
     * @since            4.0 First time
     * @deprecated       -
     * @link             -
     * @see              -
     **************************************************************************
     */

    namespace Mahan4;

    /**
     * Class sanitize
     */
    class sanitize
    {

        /**
         * int
         */
        public function int(int $id) : ?int
        {
            if($_SESSION['M']['user']['id']===$id)
                $_SESSION['M']['user'] = $this->select($id);
            $this->debugger?->log('Synced', 1,'user Lib', "User id:$id");
        }

    }