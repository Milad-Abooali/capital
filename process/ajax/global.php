<?php
    /**
     **************************************************************************
     * global.php
     * Global - Ajax
     **************************************************************************
     * @package          Mahan 4
     * @category         Core library
     * @author           Milad Abooali <m.abooali@hotmail.com>
     * @copyright        2012 - 2021 (c) Codebox
     * @license          https://codebox.ir/cbl  CBL v1.0
     **************************************************************************
     * @version          1.0
     * @since            1.0 First time
     * @deprecated       -
     * @link             -
     * @see              \Mahan4\user
     **************************************************************************
     */

    namespace Mahan4\AJAX;

    use Mahan4\debugger;
    use Mahan4\m;

    /**
     * Test Ajax call
     */
    function test(?debugger $debugger) : string {
        $debugger?->log('test','1','AJAX', 'Good Morning Milad');
        return m::randomString(12);
    }

