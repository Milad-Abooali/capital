<?php
/**
 **************************************************************************
 * email.php
 * Email Manager
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
 * Class email
 * @database emails
 */
class email
{

    const DB_TABLE = 'email_log';
    private ?i_mysql $db;
    private ?debugger $debugger;
    private string $path = APP['WS']['root'].'email-themes/';

    /**
     * email constructor.
     */
    function __construct(?debugger $debugger=null) {
        $this->debugger = $debugger;
        global $db_main;
        $this->db = $db_main;
    }

    /**
     * Send Email
     */
    public function send(array $receivers_data, string $subject,string $message=null, string $theme='default') :void
    {
        foreach ($receivers_data as $receiver) {
            $headers  = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: ".APP['META']['email_from'];
            if ($theme) {
                $content = $this->make($theme, $receiver['data'], $message);
            } else {
                $content = $message;
            }
            $send = mail($receiver['email'], $subject, $content, $headers);
            $this->_log($subject, $content, $receiver, $send);
            $this->debugger?->log('Send', $send,'email Lib', json_encode($receiver));
        }
    }

    /**
     * Log Sent Mails in Database
     */
    private function _log(string $subject, string $content, array $receiver,bool $status=false) :void
    {
        $content = base64_encode($content);
        $content_escaped = $this->db->escape($content);
        $data['subject'] = $this->db->escape($subject);
        $data['content'] = $content_escaped;
        $data['user_id'] = $receiver['id'];
        $data['email']   = $receiver['email'];
        $data['status']  = $status;
        $this->db->insert(self::DB_TABLE, $data);
    }

    /**
     * make theme
     */
    public function make(string $name, $data=null, $message=null) :string
    {
        $content = (file_exists($this->path.$name.'.htm')) ? $this->path.$name.'.htm' : '';
        $searchVal[] = '{__ExtraMessage__}';
        $replaceVal[] = $message;
        if ($data) foreach ($data as $k => $v) {
            $searchVal[] = '{~~'.$k.'~~}';
            $replaceVal[] = $v;
        }
        return ($content) ? str_replace($searchVal, $replaceVal, $content) : ($message."\r\n<br>\r\n".json_encode($data));
    }

}