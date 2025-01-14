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
    use Mahan4\email;
    use Mahan4\encrypt;
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

            global $db_main;
            $where = "type='user register'";
            $notify =  $db_main->selectRow('notify', $where);
            if ($notify['email']) {
                $email = new email();
                $receiver[] = [
                    'id'    =>  $res['data'],
                    'email' =>  $_SESSION['M4']['user']['email'],
                    'data'  =>  [
                        'f_name' =>  $_SESSION['M4']['user']['f_name'],
                        'email' =>  $_SESSION['M4']['user']['email']
                    ]
                ];
                $email->send($receiver,'Account Created','','register');
            }

        }
        return $res;
    }

    /**
     * @param debugger|null $debugger
     * @return array
     */
    function login(?debugger $debugger) : array {
        $res=array();
        try {
            global $user;
            $captcha = userForm::captcha($_POST['captcha']);
            $password = userForm::password_raw($_POST['password']);
            $email = userForm::email($_POST['email']);
            $user_check = $user->selectEmail($email);
            if($user_check)
                $res['data'] = password_verify($password, $user_check['password']) ? 1 : 0;
                if($res['data']) {
                    $_SESSION['M4']['user'] = $user->selectId($user_check['id']);
                    if($_POST['remember'] ?? false) {
                        $params = session_get_cookie_params();
                        setcookie(
                            session_name(),
                            $_COOKIE[session_name()],
                            time() + $user->REMEMBER_TIME,
                            $params["path"],
                            $params["domain"],
                            $params["secure"],
                            $params["httponly"]);
                    }
                }
            else
                $res['e'] = "You have entered an invalid username or password!";
        } catch (Exception $e) {
            $debugger?->log('User Check','0','AJAX', $e->getMessage());
            $res['e'] = $e->getMessage();
        }
        return $res;
    }

    /**
     * @param debugger|null $debugger
     * @return array
     */
    function logout(?debugger $debugger) : array {
        $res=array();
        try{
            unset($_SESSION['M4']['user']);
            $res['data']=1;
        } catch (Exception $e) {
            $debugger?->log('Logout','0','AJAX', $e->getMessage());
            $res['e'] = $e->getMessage();
        }
        return $res;
    }

    /**
     * @param debugger|null $debugger
     * @return array
     */
    function recoverPass(?debugger $debugger) : array {
        $res=array();
        try {
            global $user;
            $captcha = userForm::captcha($_POST['captcha']);
            $email = userForm::email($_POST['email']);
            $req_user = $user->selectEmail($email);
            if($req_user){
                $res['user']['id'] = $req_user['id'];
                $res['user']['email'] = encrypt::hideCentralChars($req_user['email']);
                if($req_user['phone'])
                    $res['user']['phone'] = encrypt::hideCentralChars($req_user['phone']);
            } else {
                $res['e'] = "You have entered an invalid username or password!";
            }
        } catch (Exception $e) {
            $debugger?->log('User Check','0','AJAX', $e->getMessage());
            $res['e'] = $e->getMessage();
        }
        return $res;
    }
