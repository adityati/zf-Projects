<?php

class Application_Model_Guestbook
{
   protected $_first_name ;
   protected $_last_name ;
   protected $_email ;
   protected $_comment ;
   protected $_created_timestamp ;
   protected $_guest_id ;
   
   private function columnNameMapper($name)
   {
       $name = str_replace(' ','',ucwords(str_replace('_', ' ', $name)));
       
       return $name;
       
   }

   public function __construct(array $attributes = null)
   {
       if(is_array($attributes))
       {
           $this->setAttributes($attributes);
       }
   }
   
   public function __set($name, $value) {
       
       $method = 'set' . $this->columnNameMapper($name);
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid guestbook property');
        }
        $this->$method($value);
   }
   
   public function __get($name) {
       
       $method = 'get' . $this->columnNameMapper($name);
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid guestbook property');
        }
        
        return $this->$method();
        
   }

   public function setAttributes(array $attributes)
   {
       $methods = get_class_methods($this);
       
       foreach ($attributes as $key => $value)
       {
           $method = 'set'.$this->columnNameMapper($key);
           
           if (in_array($method, $methods)) 
           {
                $this->$method($value);
           }
       }
       
       return $this;
   }
   
   public function setFirstName($first_name)
   {
       $this->_first_name = $first_name;
       return $this;
   }
      
   public function getFirstName()
   {
       return $this->_first_name;
   }
   
   public function setLastName($last_name)
   {
       $this->_last_name = $last_name;
       return $this;
   }
   
   public function getLastName()
   {
       return $this->_last_name;
   }
   
   public function setEmail($email)
   {
       $this->_email = $email;
       return $this;
   }
   
   public function getEmail()
   {
       return $this->_email;
   }
   
   public function setComment($comment)
   {
       $this->_comment = $comment;
       return $this;
   }
   
   public function getComment()
   {
       return $this->_comment;
   }
   
   public function setCreatedTimestamp($created_timestamp)
   {
       $this->_created_timestamp = $created_timestamp;
       return $this;
   }
   
   public function getCreatedTimestamp()
   {
       return $this->_created_timestamp;
   }
   
   public function setGuestId($guest_id)
   {
       $this->_guest_id = $guest_id;
       return $this;
   }
   
   public function getGuestId()
   {
       return $this->_guest_id;
   }
   
}

