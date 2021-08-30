<?php
    /**
     **************************************************************************
     * userForm.php
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
    use Mahan4\Plugins\userForm;
    use Mosquitto\Exception;

    function add(?debugger $debugger) : array {
        $res['data']=[];
        $res['required'] = userForm::$REQUIRED;
        foreach ($_POST as $k=>$v)
            if(!method_exists('Mahan4\Plugins\userForm', $k)) {
                $data[$k] = $v;
            } else {
                try {
                    $res['data'][$k] = userForm::$k($v);
                    $debugger?->log('Type Check','1','AJAX', $k.' : '.$v);
                } catch (Exception $e) {
                    $debugger?->log('Type Check','0','AJAX', $e);
                    return $res['e'];
                }
            }
        return $res;
    }

    // password_verify("MySuperSafePassword!", $hashed_password)