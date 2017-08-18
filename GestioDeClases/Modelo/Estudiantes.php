<?php
require_once('Conexion.php');
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 13/07/2017
 * Time: 05:09 PM
 */
class Estudiantes extends Conexion
{
    private $idP;
    private $Nombre;
    private $Apellido;
    private $TipoDoc;
    private $Doc;
    private $Tel;
    private $email;
    private $Profesion;
    private $Seguro;
    private $Npr;
    private $Obser;
    private $foto;
    private $fecha;


    public function getAll()
    {

        $us="Estudiante";

        $sth = $this->datab->prepare('SELECT Nombre,Apellido,TipoDoc,Doc,Tel,email,Profesion,tipo FROM prueba WHERE tipo=:username');
        $sth->execute(array('username'=> $us));


        $sth->execute();

        $data = $sth->fetchAll();
        return $data;
    }

    public static function selprog(){
        $arrayprog=Estudiantes::getcombo();
        $htmlSelect ="<select id='ide'name='ide'>";
        $htmlSelect .="<option value='nada'> Seleccione </option>";
        if (count($arrayprog)>0){
            foreach ($arrayprog as $pro){
                $htmlSelect .="<option value='".$pro->getidP()."'> ".$pro->getNombre()  ." ".$pro->getApellido()."</option>";
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
        $prog =new Estudiantes();
        if( $id >0){
            $getrow=$prog->getRow("select *from prueba WHERE idP=?",array($id));
            $prog->idP=$getrow['idP'];
            $prog->Nombre=$getrow['Nombre'];
            $prog->Apellido=$getrow['Apellido'];
            $prog->Doc=$getrow['Doc'];

            $prog->Disconnect();
            return $prog;
        }else{
            return NULL;
        }
    }

    protected static function buscar($query)
    {
        $arraypro=array();
        $tmp=new Estudiantes();
        $getrows=$tmp->getRows($query);

        foreach ($getrows as $valor) {
            $prog = new Estudiantes();
            if ($valor['tipo'] == "Estudiante") {
                $prog->idP = $valor['idP'];
                $prog->Nombre = $valor['Nombre'];
                $prog->Apellido = $valor['Apellido'];
                $prog->Doc = $valor['Doc'];
                array_push($arraypro, $prog);
            }
        }
        $tmp->Disconnect();
        return $arraypro;
    }
    public  function getcombo()
    {
        return Estudiantes::buscar("SELECT * FROM prueba,horario WHERE prueba.idP =45 ");
    }

    /**
     * @return string
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param string $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }
    private $user;
    private $pass;
    private $antig;
    private $tipo;





    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getAntig()
    {
        return $this->antig;
    }

    /**
     * @param mixed $antig
     */
    public function setAntig($antig)
    {
        $this->antig = $antig;
    }



    public function __construct($Estu_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Estu_data)>1){ //
            foreach ($Estu_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idP = "";
            $this->Nombre = "";
            $this->Apellido = "";
            $this->TipoDoc = "";
            $this->Doc = "";
            $this->Tel = "";
            $this->email = "";
            $this->Profesion = "";
            $this->Seguro = "";
            $this->tipo = "";
            $this->Obser = "";
            $this->foto = "";
            $this->user = "";
            $this->pass = "";
            $this->antig = "";
        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }
    public function actualizar()
    {
        $this->updateRow("UPDATE bd_pro.prueba SET Nombre = ?, Apellido = ?, TipoDoc = ?, Doc = ?, Tel = ?, email = ? WHERE idP = ?", array(

            $this->Nombre,
            $this->Apellido,
            $this->TipoDoc,
            $this->Doc,
            $this->Tel,
            $this->email,
            $this->idP,

        ));
        $this->Disconnect();
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO bd_pro.prueba VALUES (NULL, ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array(

                $this->Nombre,
                $this->Apellido,
                $this->TipoDoc,
                $this->Doc,
                $this->Tel,
                $this->email,
                $this->foto,
                $this->Profesion,
                $this->Seguro,
                $this->antig,
                $this->tipo,
                $this->Obser,
                $this->user,
                $this->pass,
                $this->fecha,

            )
        );
        $this->Disconnect();
    }



    /**
     * @return string
     */
    public function getIdP()
    {
        return $this->idP;
    }

    /**
     * @param string $idP
     */
    public function setIdP($idP)
    {
        $this->idP = $idP;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param string $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return string
     */
    public function getApellido()
    {
        return $this->Apellido;
    }

    /**
     * @param string $Apellido
     */
    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
    }





    public function editar()
    {
        // TODO: Implement editar() method.
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }



    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @param mixed $pass
     */
    public function setPass($pass)
    {
        $this->pass = $pass;
    }


    /**
     * @return mixed
     */
    public function getTipoDoc()
    {
        return $this->TipoDoc;
    }

    /**
     * @param mixed $TipoDoc
     */
    public function setTipoDoc($TipoDoc)
    {
        $this->TipoDoc = $TipoDoc;
    }

    /**
     * @return mixed
     */
    public function getDoc()
    {
        return $this->Doc;
    }

    /**
     * @param mixed $Doc
     */
    public function setDoc($Doc)
    {
        $this->Doc = $Doc;
    }

    /**
     * @return mixed
     */
    public function getTel()
    {
        return $this->Tel;
    }

    /**
     * @param mixed $Tel
     */
    public function setTel($Tel)
    {
        $this->Tel = $Tel;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getProfesion()
    {
        return $this->Profesion;
    }

    /**
     * @param mixed $Profesion
     */
    public function setProfesion($Profesion)
    {
        $this->Profesion = $Profesion;
    }

    /**
     * @return mixed
     */
    public function getSeguro()
    {
        return $this->Seguro;
    }

    /**
     * @param mixed $Seguro
     */
    public function setSeguro($Seguro)
    {
        $this->Seguro = $Seguro;
    }

    /**
     * @return mixed
     */
    public function getNpr()
    {
        return $this->Npr;
    }

    /**
     * @param mixed $Npr
     */
    public function setNpr($Npr)
    {
        $this->Npr = $Npr;
    }

    /**
     * @return mixed
     */
    public function getObser()
    {
        return $this->Obser;
    }

    /**
     * @param mixed $Obser
     */
    public function setObser($Obser)
    {
        $this->Obser = $Obser;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }


}