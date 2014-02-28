<?php

class Application_Model_GuestbookMapper
{
    protected static $_dbTable = null;

    protected static function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        self::$_dbTable = $dbTable;
    }
 
    public static function getDbTable()
    {
        if (self::$_dbTable === null) {
            self::setDbTable('Application_Model_DbTable_Guestbook');
        }
        return self::$_dbTable;
    }
 
    public static function AddGuestbookEntry(array $formValues )
    {
        $guestbook = new Application_Model_Guestbook($formValues);
        
        $data = array(
            'first_name'    => $guestbook->getFirstName(),
            'last_name'    => $guestbook->getLastName(),
            'email'   => $guestbook->getEmail(),
            'comment' => $guestbook->getComment(),
            'created_timestamp' => date('Y-m-d H:i:s'),
        );
       
        if(($guest_id = $guestbook->getGuestId()) === null)
        {
            self::getDbTable()->insert($data);
        }
        else
        {
            self::getDbTable()->update($data, array('$guest_id = ?' => $guest_id));
        }
    }
    
    public static function EditGuestbookEntry(array $formValues)
    {
        self::AddGuestbookEntry($formValues);
    }
    
    public static function GetGuestbookEntries()
    {
        $resultSet = self::getDbTable()->fetchAll();
        
        $entries   = array();
        $guestbook = new Application_Model_Guestbook();
        foreach ($resultSet as $row) {     
            $guestbook->setGuestId($row->guest_id)
                  ->setFirstName($row->first_name)
                  ->setLastName($row->last_name)
                  ->setEmail($row->email)
                  ->setComment($row->comment)
                  ->setCreatedTimestamp($row->created_timestamp);
            $entries[] = $guestbook;
        }
        
        return $entries;        
    }
    
    public static function GetGuestbookEntry($guest_id)
    {
        $result = self::getDbTable()->find($guest_id);
        if (!count($result)) {
            return;
        }
        
        $guestbook = new Application_Model_Guestbook();
        $row = $result->current();
        $guestbook->setGuestId($row->guest_id)
                  ->setFirstName($row->first_name)
                  ->setLastName($row->last_name)
                  ->setEmail($row->email)
                  ->setComment($row->comment)
                  ->setCreatedTimestamp($row->created_timestamp);
        
        return $guestbook;
    }
}

