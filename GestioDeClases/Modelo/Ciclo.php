<?php
require_once ('Conexion.php');
/**
 * Created by PhpStorm.
 * User: Cristtian PC
 * Date: 20/07/2017
 * Time: 22:14
 */
class Ciclo extends Conexion
{
    private $idC;
    private $Nombre;
    private $Nivel;

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
    public function getNivel()
    {
        return $this->Nivel;
    }

    /**
     * @param mixed $Nivel
     */
    public function setNivel($Nivel)
    {
        $this->Nivel = $Nivel;
    }

    public function __construct($Profe_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Profe_data)>1){ //
            foreach ($Profe_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idP = "";
            $this->Nombre = "";
            $this->Nivel = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }
    public static function selci(){
        $arraypro=Ciclo::getcombo();
        $htmlSelect ="<select style='width: 30%' id='idC'name='idC'>";
        $htmlSelect .="<option style='width: 30%' value='nada'> Seleccione </option>";
        if (count($arraypro)>0){
            foreach ($arraypro as $pro){
                $htmlSelect .="<option value='".$pro->getIdC()."'> ".$pro->getNombre()."</option>";
            }
            $htmlSelect .= "</select>";
        }else{
            $htmlSelect="Error no hay Ciclos ";
        }
        return $htmlSelect;
    }
    protected static function buscar($query)
    {
        $arraypro=array();
        $tmp=new Ciclo();
        $getrows=$tmp->getRows($query);

        foreach ($getrows as $valor){
            $prog= new Ciclo();
                $prog->idC=$valor['idC'];
                $prog->Nombre=$valor['NombreC'];
                array_push($arraypro,$prog);
        }
        $tmp->Disconnect();
        return $arraypro;
    }
    public function getcombo(){
        return Ciclo::buscar('SELECT * FROM ciclo');
    }
    public function gettabla(){
        return Ciclo::buscar('SELECT * FROM ciclo WHERE NombreC LIKE '%". 'pre' ."%' OR Nivel LIKE '%". 'or' ."%'');
    }


    public function tab()
    {
        $arraypro=Ciclo::gettabla();


            foreach ($arraypro as $pro){
                $htmlSelect ="<tr>";
                $htmlSelect .= "   <td>$pro->getIdC()</td>";
                $htmlSelect .= "   <td>$pro->getNombreC()</td>";
                $htmlSelect .= "   <td>$pro->getNivel()</td>";
                $htmlSelect .="</tr>";
            }

        return $htmlSelect;
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO bd_pro.ciclo VALUES (NULL, ?,?)", array(
                $this->Nombre,
                $this->Nivel,
            )
        );
        $this->Disconnect();
    }
}