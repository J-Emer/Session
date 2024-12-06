<?php 

namespace Jemer\Session;

class SessionManager
{
    private static $instance;
    private $sessionStarted = false;

    /**
     * Instance of the SessionManager class
     * @returns static instance of SessionManager
     */
    public static function Instance()
    {
        if(!isset(self::$instance))
        {
            self::$instance = new SessionManager();
        }

        return self::$instance;
    }
    /**
     * Starts a new session
     * @params $data[]. Assoc-Array of data to be stored in $Session 
     */
    public function Start($data)
    {
        session_start();

        foreach ($data as $key => $value) 
        {
            $_SESSION[$key] = $value;
        }

        $this->sessionStarted = true;
    }
    /**
     * Returns true/false if the session has been started
     * @returns bool
     */
    public function HasStarted() : bool
    {
        return $this->sessionStarted;
    }

    /**
     * Gets a specific key from the $Session array
     * $param $key: the key to be retrieved from the $Session array
     * @returns string
     */
    public function Get($key) : string
    {
        if(isset($_SESSION[$key]))
        {
            return $_SESSION[$key];
        }
        else
        {
            return "*** error: value not found ***";
        }
    }
    /**
     * Ends the session
     */
    public function End()
    {
        foreach ($_SESSION as $key=>$value)
        {
            if (isset($GLOBALS[$key])){
                unset($GLOBALS[$key]);
            }
            if(isset($_SESSION[$key]))
            {
                unset($_SESSION[$key]);
            }

        }
        session_destroy();
        $this->sessionStarted = false;
    }
    /**
     * Dumps all $session variables
     */
    public function Dump()
    {
        // foreach ($_SESSION as $key=>$value)
        // {
        //    echo $_SESSION[$key] . PHP_EOL;
        // }
        var_dump($_SESSION);
    }
}

?>