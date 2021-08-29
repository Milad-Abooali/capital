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

    /**
     * Class user
     */
    class user extends sanitize
    {

        /**
         * Is Float
         */
        public static function isFloat(mixed $value) :bool
        {
            return ctype_digit($value);
        }

        /**
         * Is Integer
         */
        public static function isInt(mixed $value) :bool
        {
            return is_numeric($value);
        }

        /**
         * is Email
         */
        public static function isEmail(string $value) :array
        {
            return filter_var($value, FILTER_VALIDATE_EMAIL);
        }

    }