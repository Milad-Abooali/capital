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
    private string $error='';
    private ?i_mysql $db;
    private ?debugger $debugger;

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
                $content = wordwrap($message,70);
            }
            $send = mail($receiver['email'], $subject, $content, $headers);
            $this->_log($subject, $content, $receiver, boolval($send));
            $this->debugger?->log('Send',boolval($send),'email Lib', json_encode($receiver));
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

    ////////////////////////////////////////////////////////////
    /**
     * make theme
     */
    public function make(string $name, $data=null, $message=null) :string
    {
        $content = file_get_contents((file_exists($this->path.$name.'.htm')) ? $this->path.$name.'.htm' : '../'.$this->path.$name.'.htm');
        $searchVal[] = '{__ExtraMessage__}';
        $replaceVal[] = $message;
        if ($data) foreach ($data as $k => $v) {
            $searchVal[] = '{~~'.$k.'~~}';
            $replaceVal[] = $v;
        }
        return str_replace($searchVal, $replaceVal, $content);
    }

    /**
     * Load Theme
     * @param $id
     * @return mixed
     */
    public function load($id)
    {
        $output['data'] = $this->db->selectId($this->table,$id);
        $content = file_get_contents($this->path.$id.'.htm');
        $output['content'] = $content;
        return $output;
    }

    /**
     * Creat New Theme
     * @param $name
     * @param $cat
     * @return bool|int|mysqli_result|string
     */
    public function creat($name,$cat)
    {
        $data['name']      = $name;
        $data['cat']       = $cat;
        $data['update_by'] = $_SESSION['id'];
        $id = $this->db->insert($this->table,$data);
        if($id) {
            $themeFile = fopen('../'.$this->path.$id.'.htm', "w") or die("Unable to open file!");
            fclose($themeFile);
        }
        // Add actLog
        global $actLog; $actLog->add('Email',$id,1,"Creat New Theme");
        return ($id) ?? false;
    }

    public function update($id,$name,$cat,$content)
    {
        $data['name']      = $name;
        $data['cat']       = $cat;
        $data['update_by'] = $_SESSION['id'];
        $update = $this->db->updateId($this->table,$id,$data);
        if($update) {
            $themeFile = fopen('../'.$this->path.$id.'.htm', "w") or die("Unable to open file!");
            fwrite($themeFile, $content);
            fclose($themeFile);
        }
        // Add actLog
        global $actLog; $actLog->add('Email',$id,1,"Edit Theme");
        return $update;
    }

    /**
     * Delete Theme
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $file = unlink($this->path.$id.'.htm');
        $database = $this->db->deleteId($this->table,$id);
        // Add actLog
        global $actLog; $actLog->add('Email',$id,1,"Delete Theme");
        return $file && $database;
    }

}