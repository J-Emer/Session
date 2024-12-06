<?php

use Jemer\Session\SessionManager;

require "vendor/autoload.php";



SessionManager::Instance()->Start([
                    "username" => "Bob",
                    "role" => "manager",
                    "yearsOfService" => 15
                ]);

echo SessionManager::Instance()->Get("username");
echo SessionManager::Instance()->Get("yearsOfService");
echo SessionManager::Instance()->Dump();

SessionManager::Instance()->End();


?>