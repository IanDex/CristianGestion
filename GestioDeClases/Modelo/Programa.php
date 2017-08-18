<?php
require_once('Conexion.php');
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 23/07/2017
 * Time: 12:23 AM
 */
class Programa extends Conexion
{
    private $idP;
    private $Nombre;
    private $C_min;
    private $C_max;
    private $idC;

    public function __construct($Progra_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Progra_data)>1){ //
            foreach ($Progra_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idP = "";
            $this->Nombre = "";
            $this->C_min = "";
            $this->C_max = "";

        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }


    public function insertar()
    {
        $this->insertRow("INSERT INTO bd_pro.programa VALUES (NULL, ?,?,?,?)", array(

                $this->Nombre,
                $this->C_min,
                $this->C_max,
                $this->idC,

            )
        );
        $this->Disconnect();
    }
     public static function selprog(){
        $arrayprog=Programa::getcombo();
        $htmlSelect ="<select id='idp'name='idp'>";
        $htmlSelect .="<option value='nada'> Seleccione </option>";
        if (count($arrayprog)>0){
            foreach ($arrayprog as $pro){
                $htmlSelect .="<option value='".$pro->getidP()."'> ".$pro->getNombre()."</option>";
            }
            $htmlSelect .= "</select>";
        }else{
            $htmlSelect="Error no hay programas ";
        }
        return $htmlSelect;
    }
 function _destruct(){
        $this->Disconnect();
 }




    protected static function buscarForId($id)
    {
        $prog =new Programa();
        if( $id >0){
            $getrow=$prog->getRow("select *from programa WHERE idP=?",array($id));
            $prog->idP=$getrow['idP'];
            $prog->Nombre=$getrow['Nombre'];
            $prog->C_max=$getrow['C_max'];
            $prog->C_min=$getrow['C_min'];

            $prog->Disconnect();
            return $prog;
        }else{
            return NULL;
        }
    }

    protected static function buscar($query)
    {
        $arraypro=array();
        $tmp=new Programa();
        $getrows=$tmp->getRows($query);

        foreach ($getrows as $valor){
            $prog= new Programa();
            $prog->idP=$valor['idP'];
            $prog->Nombre=$valor['Nombre'];
            $prog->C_min=$valor['C_min'];
            $prog->C_max=$valor['C_max'];
            array_push($arraypro,$prog);
        }
        $tmp->Disconnect();
        return $arraypro;
    }
    public  function getcombo()
    {
        return Programa::buscar("SELECT * FROM programa");
    }



    public function getAll()
    {
        $sth = $this->datab->prepare('SELECT Nombre,C_min,C_max FROM programa');
        $sth->execute();

        $data = $sth->fetchAll();
        return $data;
    }
























    /**
     * @return mixed
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * @param mixed $idP
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;
    }

    /**
     * @return mixed
     */
    public function getIdC()
    {
        return $this->idC;
    }

    /**
     * @param mixed $idC
     */
    public function setIdC($idC)
    {
        $this->idC = $idC;
    }


    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed
     */
    public function getCMin()
    {
        return $this->C_min;
    }

    /**
     * @param mixed $C_min
     */
    public function setCMin($C_min)
    {
        $this->C_min = $C_min;
    }

    /**
     * @return mixed
     */
    public function getCMax()
    {
        return $this->C_max;
    }

    /**
     * @param mixed $C_max
     */
    public function setCMax($C_max)
    {
        $this->C_max = $C_max;
    }

}