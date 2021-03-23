<?php 
namespace src\classes;

use Src\traits\traitUrlParser;

Class ClassRouter
{
    use traitUrlParser;
    
    private $Rota;

    //Obtem a rota;
    public function getRota()
    {
        $url=$this->parseUrl();                                                                
        $indice = $url[0];
        
        //Rotas;
        $this->Rota=array(
            "home"=>"ControllerHome",
            "login"=>"ControllerLogin",
            "cadastro"=>"ControllerCadastro"
        );
        
        //verifica se existe uma rota;
        if(array_key_exists($indice, $this->Rota)){
            //verifica se o arquivo da rota existe;
            if(file_exists("../app/controller/{$this->Rota[$indice]}.php")) {
                return $this->Rota[$indice];
            }
            else{
                return "ControllerHome";
            }
        }
        else{
            return "Controller404";
        }
    }
}