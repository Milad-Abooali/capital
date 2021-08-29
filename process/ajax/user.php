<?php
    /**
     **************************************************************************
     * user.php
     * User Manager - Ajax
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
     * @see              \Mahan4\user
     **************************************************************************
     */

    namespace Mahan4\AJAX;

    use Mahan4\debugger;
    use Mahan4\m;
    use Mahan4\sanitize;
    use TypeError;

    function add(?debugger $debugger) : string {
        $data=[];
        foreach ($_POST as $k=>$v)
            if(!method_exists('sanitize', $k)) {
                $data[$k] = $v;
            } else {
                try {
                    $data[$k] = sanitize::$k($v);
                } catch (TypeError $e) {
                    echo 'Error: ', $e->getMessage();
                }
            }
        $debugger?->log('test','1','AJAX', 'Good Morning Milad');
        return m::randomString(12);
    }
