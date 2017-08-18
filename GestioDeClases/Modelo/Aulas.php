<?php
require_once('Conexion.php');
/**
 * Created by PhpStorm.
 * User: juli-
 * Date: 22/07/2017
 * Time: 18:42
 */
class Aulas extends Conexion
{
    private $idAl;
    private $Nombre;
    private $Numero;
    private $Cap;
    private $Estado;
    public function __construct($Profe_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Profe_data)>1){ //
            foreach ($Profe_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idAl = "";
            $this->Nombre = "";
            $this->Numero = "";
            $this->Cap = "";
            $this->Estado = "";
        }
    }

    public static function selaul(){
        $arraypro=Aulas::getcombo();
        $htmlSelect ="<select style='width: 30%' id='ida'name='ida'>";
        $htmlSelect .="<option style='width: 30%' value='nada'> Seleccione </option>";
        if (count($arraypro)>0){
            foreach ($arraypro as $pro){
                $htmlSelect .="<option value='".$pro->getIdAl()."'> ".$pro->getNombre()."</option>";
            }
            $htmlSelect .= "</select>";
        }else{
            $htmlSelect="Error no hay Aulas ";
        }
        return $htmlSelect;
    }
    protected static function buscar($query)
    {
        $arraypro=array();
        $tmp=new Aulas();
        $getrows=$tmp->getRows($query);

        foreach ($getrows as $valor){
            $prog= new Aulas();
            $prog->idAl=$valor['idAl'];
            $prog->Nombre=$valor['NombreAl'];

            array_push($arraypro,$prog);


        }
        $tmp->Disconnect();
        return $arraypro;
    }
    public function getcombo(){
        return Aulas::buscar('SELECT * FROM aulas');
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }
    public function insertar()
    {
        $this->insertRow("INSERT INTO bd_pro.aulas VALUES (NULL, ?,?,?,?)", array(

                $this->Nombre,
                $this->Numero,
                $this->Cap,
                $this->Estado,
            )
        );
        $this->Disconnect();
    }
    public function getAll(){
        $sth = $this->datab->prepare('SELECT Nombre,Numero,Cap,Estado FROM aulas');
        $sth->execute();

        $data = $sth->fetchAll();
        return $data;
    }
    /**
     * @return string
     */
    public function getIdAl()
    {
        return $this->idAl;
    }

    /**
     * @return string
     */
    public function setIdAl($idAl)
    {
        $this->idAl = $idAl;
    }


    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @return string
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function getNumero()
    {
        return $this->Numero;
    }

    /**
     * @return string
     */
    public function setNumero($Numero)
    {
        $this->Numero = $Numero;
    }

    public function getCap()
    {
        return $this->Cap;
    }

    /**
     * @return string
     */
    public function setCap($Cap)
    {
        $this->Cap = $Cap;
    }

    public function getEstado()
    {
        return $this->Estado;
    }

    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    protected static function buscarForId($id)
    {
        // TODO: Implement buscarForId() method.
    }





    protected function editar()
    {
        // TODO: Implement editar() method.
    }

    protected function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}