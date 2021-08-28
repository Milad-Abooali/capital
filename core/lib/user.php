<?php
    /**
     **************************************************************************
     * user.php
     * User Manager
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
     * @see              -
     **************************************************************************
     */

    namespace Mahan4;

    /**
     * Class user
     * @database users
     */
    class user
    {

        public array $data;
        public bool $virtual=true;
        private ?i_mysql $db;
        private debugger|null $debugger=null;

        /**
         * user constructor.
         */
        function __construct(int $id=null, debugger|null $debugger=null) {
            if($id) $this->select($id);
            global $db_main;
            $this->db = $db_main;
            $this->debugger = $debugger;
            $debugger?->log('User','0','Libraries', 'No database connection!');
            if($this->db==null) return false;
        }


        /*
         * Add User
         */
        public function add(array $data) : int
        {

        }


        /*
         * Select User
         */
        public function select(int $id, bool $virtual) : bool
        {

        }


        /**
         * Add Block Start Time
         *
         * @param string $block
         * @return mixed
         */
        public function start(string $block): mixed
        {
            if(isset($this->blocks[$block]['start'])) {
                $debug_backtrace = debug_backtrace();
                $caller = array_shift($debug_backtrace);
                $this->Errors['block_exist'] = 'Block: '.$block.' | '.$caller['file'].' Line '.$caller['line'];
                $this->debugger?->log("Start > $block",0,'timer', $this->Errors['block_exist']);
                return $this->Errors['block_exist'];

            }
            $this->blocks[$block]['start'] = microtime(true);
            $this->debugger?->log("Start > $block",1,'timer',$this->blocks[$block]['start']);
            return $this->blocks[$block]['start'];
        }

        /**
         * Add Block End Time
         *
         * @param ?string $block
         * @return mixed
         */
        public function end(?string $block): mixed
        {
            if ($block){
                if (!isset($this->blocks[$block]['start'])) {
                    $debug_backtrace = debug_backtrace();
                    $caller = array_shift($debug_backtrace);
                    $this->Errors['miss_start'] = 'Block: '.$block.' | '.$caller['file'].' Line '.$caller['line'];
                    $this->debugger?->log("End > $block",0,'timer', $this->Errors['miss_start']);
                    return $this->Errors['miss_start'];
                }
                $this->blocks[$block]['end']  = microtime(true);
                $this->blocks[$block]['time'] = round($this->blocks[$block]['end'] - $this->blocks[$block]['start'],4, PHP_ROUND_HALF_UP);
                $this->debugger?->log("End > $block",1,'timer',$this->blocks[$block]);
                return $this->blocks[$block]['time'];
            } else {
                foreach ($this->blocks as $block => $times) {
                    $this->blocks[$block]['end']  = microtime(true);
                    $this->blocks[$block]['time'] = round($this->blocks[$block]['end'] - $this->blocks[$block]['start'],4, PHP_ROUND_HALF_UP);
                    $this->debugger?->log("End > $block",1,'timer',$this->blocks[$block]);
                }
                return $this->blocks['page']['time'];
            }
        }

        /**
         * Get Block(s) Time
         *
         * @param string|null $block Null to list all blocks
         * @return mixed
         */
        public function get(string $block=null): mixed
        {
            if(!$block)
                return $this->Errors ?? $this->blocks;
            if(isset($this->blocks[$block]))
                return $this->Errors ?? $this->blocks[$block];
            else
                return false;
        }

    }