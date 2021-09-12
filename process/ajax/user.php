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
    use Exception;
    use Mahan4\user;

    /**
     * @param debugger|null $debugger
     * @return array
     */
    function add(?debugger $debugger) : array {
        $res=$data=$insert=[];
        foreach(userForm::$REQUIRED as $fields)
            if(!($_POST[$fields] ?? false))
                $res['e'] = $fields;
        foreach ($_POST as $k=>$v)
            if($v)
                if(!method_exists('Mahan4\Plugins\userForm', $k)) {
                    $data[$k] = $v;
                } else {
                    try {
                        $data[$k] = userForm::$k($v);
                        $debugger?->log('Type Check','1','AJAX', $k.' : '.$v);
                    } catch (Exception $e) {
                        $debugger?->log('Type Check','0','AJAX', $e->getMessage());
                        $res['e'] = $e->getMessage();
                    }
                }
        global $user;
        if($user->selectEmail($data['email'])){
            $res['e'] = "This email address has an account in our site!";
            $debugger?->log('Unique Check','0','AJAX', $res['e']);
        }
        if($res['e'] ?? false)
            return $res;
        foreach (userForm::$COLS as $col)
            $insert[$col] = $data[$col] ?? null;
        $res['data'] = $user->add($insert);
        if($res['data']){
            $_SESSION['M4']['user']['id']=$res['data'];
            $user->sync($res['data']);
        }
        return $res;
    }

    /**
     * @param debugger|null $debugger
     * @return bool
     */
    function login(?debugger $debugger) : bool {
        global $user;
        $email = userForm::$k($v);
    }
    // password_verify("MySuperSafePassword!", $hashed_password)