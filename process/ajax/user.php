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
    use Mosquitto\Exception;

    function add(?debugger $debugger) : array {
        $res['data']=[];
        foreach ($_POST as $k=>$v)
            if(!method_exists('sanitize', $k)) {
                $data[$k] = $v;
            } else {
                try {
                    $res['data'][$k] = sanitize::$k($v);
                } catch (Exception $e) {
                    $debugger?->log('TypeError','1','AJAX', $e);
                    return $res['e'];
                }
            }
        $debugger?->log('test','1','AJAX', 'Good Morning Milad');
        return $res;
    }

    // password_verify("MySuperSafePassword!", $hashed_password)