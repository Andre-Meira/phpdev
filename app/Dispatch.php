<?php
namespace App;

use Src\classes\ClassRouter;

class Dispatch extends ClassRouter
{

    #Atributos;
    private $method; 
    private $Param = [];
    private $Obj;

    protected function getMethod(){return $this->method;}
    public function setMethod($method){$this->method = $method;}
    protected function getParam(){return $this->Param;}
    public function setParam($Param){$this->Param = $Param;}

    #Metodo Contrustor;
    Public function __construct()
    {
        $this->addController();
    }

    #metodo de Edição de Controller;
    private function addController()
    {
        $RotaController = $this->getRota();
        $NameS = "App\\Controller\\{$RotaController}";
        $this->Obj = new $NameS; // OBJ = App\Controller\

        if($this->parseUrl()[1]){
            $this->addMethod();
        }
    }

    private function addMethod() 
    {
        if(method_exists($this->Obj, $this->parseUrl()[1])){
            $this->setMethod("{$this->parseUrl()[1]}");
            $this->addParam();
            call_user_func_array([$this->Obj, $this->getMethod()], $this->getParam());
        }
        else{
            echo "Este Param não existe";
        }
    }

    private function addParam() 
    {

    }


}