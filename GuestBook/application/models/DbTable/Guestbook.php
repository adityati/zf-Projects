<?php

class Application_Model_DbTable_Guestbook extends Zend_Db_Table_Abstract
{
    
    /* name of the database table*/
    protected $_name = 'guestbook';
    
    /* primary key of the database table*/
    protected $_primary = 'guest_id';
    


}

