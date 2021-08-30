<?php
    /**
     **************************************************************************
     * user.php
     * User Manager - sanitize
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

    namespace Mahan4\Plugins;

    use Mahan4\sanitize;
    use Mosquitto\Exception;

    /**
     * Class user
     */
    class user extends sanitize
    {

        /**
         * Email
         * @throws Exception
         */
        public static function email(mixed $value) :string
        {
            if(self::isEmail($value))
                return strtolower($value);
            throw new Exception('Email address is not valid!');
        }

        /**
         * First Name
         * @throws Exception
         */
        public static function f_name(mixed $value) :string
        {
            if(preg_match("/^([a-zA-Z' ]+)$/", $value))
                return ucfirst($value);
            throw new Exception('First Name is not valid!');
        }

        /**
         * Last Name
         * @throws Exception
         */
        public static function l_name(mixed $value) :string
        {
            if(preg_match("/^([a-zA-Z' ]+)$/", $value))
                return ucfirst($value);
            throw new Exception('First Name is not valid!');
        }

    }