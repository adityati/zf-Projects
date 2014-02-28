<?php

class Application_Form_Guestbook extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        
        /* initializing parent init() */
        parent::init();
        
        $this->setMethod('post');
        
        $this->addElement('text','first_name',array(
            'label'     => 'First Name',
            'required'  => true
        ));
    
        $this->addElement('text','last_name',array(
            'label'     => 'Last Name',
            'required'  => 'Last Name'
        ));
        
        $this->addElement('text','email',array(
            'label'     => 'Email',
            'required'  =>  true
        ));
        
        $this->addElement('textarea','comment',array(
            'label'     => 'Comment',
            'required'  => true
        ));
        
        $this->addElement('submit','submit',array(
            'label'     => 'Sign Guestbook'
        ));
        
        $this->addElement('hash','csrf',array(
            'ignore'    => true
        ));
    }


}

