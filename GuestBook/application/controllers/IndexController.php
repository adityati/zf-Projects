<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        // action body
        
         
         $this->view->entries = Application_Model_GuestbookMapper::GetGuestbookEntries();
       
    }

    public function signAction()
    {
        
        $request = $this->getRequest();
        
        $form = new Application_Form_Guestbook();  
        
        if($request->isPost())
        {
            if ($form->isValid($request->getPost())) 
                {
                      Application_Model_GuestbookMapper::AddGuestbookEntry($form->getValues());
                      echo '<h3> Successfully Inserted</h3>';
                      return $this->_helper->redirector('index');
                }
        }   
        
        $this->view->form = $form;
    }
    
    public function updateAction()
    {
         
    }

}

