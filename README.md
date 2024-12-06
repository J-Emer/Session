# Session
 Session manager for Php projects.

## Useage



```php

use Jemer\Session\SessionManager;

```

Start a new session by calling the ``` SessionManager::Instance()->Start ``` method. Pass in any session properties that you would want.  

```php
SessionManager::Instance()->Start([
                    "username" => "Bob",
                    "role" => "manager",
                    "yearsOfService" => 15
                ]);
                
```

To get a property from the session manager just call its ``` Get() ``` and pass in the name of the key. In this case were looking for the "username"

```php
echo SessionManager::Instance()->Get("username");

returns: Bob
```

To end the session just call the ``` SessionManager::Instance()->End() ```. This will end the session and remove all values from the ``` $_SESSION ``` array. 


