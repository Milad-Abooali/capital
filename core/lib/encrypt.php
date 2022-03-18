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
    class encrypt
    {

        /**
         * Hide Central Characters
         */
        public static function hideCentralChars(string $input, $hiddenChar='*') :string
        {
            $l = strlen($input);
            if($l<3)
                return str_repeat($hiddenChar, $l);
            $c = $l/3;
            return substr($input, 0, $c).str_repeat($hiddenChar, $c).substr($input, $c*2, $l);
        }

    }