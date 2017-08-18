<?php
require_once('Conexion.php');
/**
 * Created by PhpStorm.
 * User: Administrador
 * Date: 29/07/2017
 * Time: 11:21 PM
 */
class Nota extends Conexion
{
    private $idN;
    private $N_Final;
    private $P_50;
    private $S_50;
    private $Profesor;
    private $Materia;







    public function __construct($nota_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($nota_data)>1){ //
            foreach ($nota_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idN = "";
            $this->N_Final = "";
            $this->P_50 = "";
            $this->S_50 = "";
            $this->Profesor="";
            $this->Materia="";
        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }



    public function insertar()
    {
        $this->insertRow("INSERT INTO bd_pro.notas VALUES (NULL, ?,?,?,?)", array(

                $this->N_final,
                $this->P_50,
                $this->S_50,
                $this->Profesor,



            )
        );
        $this->Disconnect();
    }



    public function getAll()
    {
        $sth = $this->datab->prepare('SELECT * FROM notas');
        $sth->execute();

        $data = $sth->fetchAll();
        return $data;
    }

























    /**
     * @return mixed
     */
    public function getIdN()
    {
        return $this->idN;
    }

    /**
     * @param mixed $idN
     */
    public function setIdN($idN)
    {
        $this->idN = $idN;
    }

    /**
     * @return mixed
     */
    public function getNFinal()
    {
        return $this->N_Final;
    }

    /**
     * @param mixed $N_Final
     */
    public function setNFinal($N_Final)
    {
        $this->N_Final = $N_Final;
    }

    /**
     * @return mixed
     */
    public function getP50()
    {
        return $this->P_50;
    }

    /**
     * @param mixed $P_50
     */
    public function setP50($P_50)
    {
        $this->P_50 = $P_50;
    }

    /**
     * @return mixed
     */
    public function getS50()
    {
        return $this->S_50;
    }

    /**
     * @param mixed $S_50
     */
    public function setS50($S_50)
    {
        $this->S_50 = $S_50;
    }

    /**
     * @return mixed
     */
    public function getProfesor()
    {
        return $this->Profesor;
    }

    /**
     * @param mixed $Profesor
     */
    public function setProfesor($Profesor)
    {
        $this->Profesor = $Profesor;
    }

    /**
     * @return mixed
     */
    public function getMateria()
    {
        return $this->Materia;
    }

    /**
     * @param mixed $Materia
     */
    public function setMateria($Materia)
    {
        $this->Materia = $Materia;
    }


}