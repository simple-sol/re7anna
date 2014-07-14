<?php

class db {

    /**
     * tables names
     * @var array of tables name
     */
    static $tables = array(
        //
        'sys_users' => '`rehanna_users`.`rehanna_sys_users`',
        'employee' => '`rehanna_users`.`rehanna_employee`',
        'customers' => '`rehanna_users`.`rehanna_customers`',
        'owners' => '`rehanna_users`.`rehanna_owners`',
        'traders' => '`rehanna_users`.`rehanna_traders`',
        'stores' => '`rehanna_products`.`rehanna_stores`',
        'markets' => '`rehanna_products`.`rehanna_markets`',
        'login_attempts' => '`rehanna_users`.`login_attempts`',
        'login_logs' => '`rehanna_system_logs`.`login_logs`',
        'register_logs' => '`rehanna_system_logs`.`register_logs`',
        'manufacture_logs' => '`rehanna_system_logs`.`rehanna_factory_manufature_orders_logs`',
        'sales_logs' => '`rehanna_system_logs`.`rehanna_market_sales_logs`',
    );

    /**
     * @var array of database information
     */
    private $db_info = array("host" => "localhost", "dbname" => "rehanna_users", "username" => "root", "password" => "123");

    /**
     * @var object of mysqli 
     */
    private $dbh;

    /**
     * @var instance from db class 
     */
    public static $instance = NULL;

    /**
     * @param array $db_info
     * @return void
     */
    public function __construct() {
        $this->dbh = new mysqli('localhost', 'root', '123', 'rehanna_users');
        $this->dbh->query("SET NAMES utf8");
    }

    /**
     * @return object from db class
     */
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new db();
        }
        return self::$instance;
    }

    /**
     * @param string $query
     * @return array of all rows
     */
    public function fetchRows($query) {
        $rst = self::getinstance()->multi_query($query);
        $data = $this->fetch_all($rst);

        return $data;
    }

    /**
     * @param string of $query
     * @param int of $page number
     * @param int of $count of data
     * @return array of data , morData (if there is more data 1 or  0  if not)
     */
    function fetchRowsPages($query, $page = 0, $count = 3) {

        $page = intval($page);
        $count = intval($count);
        $start = $count * $page;

        $res = $query . " limit $start , $count";

        $rst = self::getinstance()->multi_query($res);
        $data = $this->fetch_all($rst);
        unset($res, $rst);
        // check if there is more data 

        $res = $query . " limit " . ($count * ($page + 1)) . " , 1";
        $rst = self::getinstance()->multi_query($res);
        $morData = self::getinstance()->num_rows($rst);



        return array('data' => $data, 'moreData' => $morData);
    }

    /**
     * @param string $query
     * @return array
     */
    public function fetchRow($query) {
        $rst = self::getinstance()->multi_query($query);
        return $rst->fetch_array();
    }

    /**
     * @param string $query
     * @return object of mysqli query pointer
     * @throws Exception
     */
    public function sendReport($exc) {
        $msg = "<div style='direction:ltr;'>Error No: " . $exc->getCode() . " - " . $exc->getMessage() . "<br >" . nl2br($exc->getTraceAsString()) . '</div>';
        exit('<!-- ' . $msg . ' -->');
        if (!class_exists('notification')) {
            $notfile = dirname(__file__) . '/notification.php';
            if (file_exists($notfile)) {
                include $notfile;
            } else {
                exit('<!-- ' . $msg . ' -->');
            }
        }

        $subject = "database error #" . $exc->getCode();
        $userinfo = array('email' => "hi@simple-sol.com", 'nickname' => "rehanna tech team");
        notification::getNotifications()->sendMail($subject, $userinfo, 'blank', $msg);
    }

    public function query($query) {
        $rst = $this->dbh->query($query);

        if ($this->dbh->error) {
            try {
                throw new Exception("MySQL error {$this->dbh->error} <br> Query:<br> $query", $this->dbh->errno);
            } catch (Exception $exc) {
                // error handler
                // $this->sendReport($exc);
            }
        }

        return $rst;
    }

    function numRows($rst) {
        return $rst->num_rows;
    }

    /**
     * @param object $sth from query function
     * @return array
     */
    public function simpleFetchRow($sth) {
        return $sth->fetch_array(MYSQLI_BOTH);
    }

    /**
     * @return int of last insert id
     */
    public function insertId() {
        return $this->dbh->insert_id;
    }

    /**
     * @param string $name
     * @return string converted by mysqli real_escape_string
     */
    public function realEscapeString($name) {
        return $this->dbh->real_escape_string($name);
    }

    // mirror functions 

    function querySelf($query) {
        return db::getInstance()->fetch_row($query);
    }

    function fetchArray($result) {
        return db::getInstance()->simple_fetch_row($result);
    }

    /**
     * destory the current conncetion
     * @return boolean
     */
    function close() {
        return $this->dbh->close();
    }

    /**
     * free result
     * @return void 
     */
    function freeResult($rst) {

        $rst->free_result();
    }

    function multiQuery($query) {
        $this->dbh->multi_query($query);
        $result = $this->dbh->store_result();

        if ($this->dbh->error) {
            try {
                throw new Exception("MySQL error {$this->dbh->error} <br> Query:<br> $query", $this->dbh->errno);
            } catch (Exception $exc) {
                echo $exc->getMessage();
                //    $this->sendReport($exc);
            }
        }
        if (mysqli_more_results($this->dbh)) {
            mysqli_next_result($this->dbh);
        }

        return $result;
    }

    function fetchAll($rst) {

        if (!$rst) {
            return;
        }
        $data = array();
        while ($row = $rst->fetch_assoc()) {
            $data[] = $row;
        }
        $rst->free_result();
        return $data;
    }

}

