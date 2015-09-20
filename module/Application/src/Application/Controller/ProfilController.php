<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;

class ProfilController extends AbstractActionController
{
    private $logged;
    
    public function __construct( ) {
        $this->logged = new Container('user');
        if( !isset( $this->logged->nick ) ) {
            // nepřihlášený uživatel
            var_dump( $this->logged->nick );
            die( 'denied' );  
        }
    }

    public function indexAction()
    {
        $table = $this->getUserTable();
        foreach( $table->getUserByNick( $this->logged->nick ) as $u ) {
            return [ 
                   'user' => $u

                   ];            
        }
    }

    public function editAction()
    {
        $accepted = [ 'email', 'jmeno', 'prijmeni', 'telefon', 'adresa', 'zarizeni', 'display' ];
        $row = $_GET['row'];
        $value = str_replace( "'", "", trim( strip_tags( $_GET['value'] ) ) );
        
        if( in_array( $row, $accepted ) ) {
            $table = $this->getUserTable();
            $table->edit( $row, $value, $this->logged->nick );
        }
        return $this->response;
    }
    
    private function getUserTable()
    {
        return $this->getServiceLocator()->get('Application\Model\UserTable');
    }

}
