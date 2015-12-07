<?php
/**
 * Description of pdfDocs
 *
 * @author jcastelli
 */
//require_once("../../PIRAMIDE/config/config.inc.php");
//require_once("dbConnection.class.php");
require_once("baseDocs.class.php");

class pdfDocs extends baseDocs {
    
    //private $oConnection;
    private $connection;
    
    function __construct(){
        
        /*$this->oConnection = new dbConnection();
        $result            = $this->oConnection->executeQuery("EXEC WS_OBTENER_DB '".$_SESSION['IDSISTEMA']."'");
        $dbName            = $result[0][0];
        $this->oConnection = new dbConnection( $dbName );
            require("../../PIRAMIDE/config/config.inc.php");                                   
            $this->connection = mssql_connect ($dbServer, $dbUser, $dbPass) OR die ("Error en la conexion***");
            mssql_select_db( $dbName );//Conexion a Zurich_PTCore
            //Busco a que base a la que me debo conectar
            $query = "EXEC WS_OBTENER_DB '".$_SESSION['IDSISTEMA']."'";
            $result = mssql_query($query, $this->connection) OR die ("Error: ".$query."<hr> ".mssql_get_last_message()."<BR>");
            $i=0;
            unset($vlist);
            while ($list = @mssql_fetch_row($result)){
              $cantidadLineas = count($list);
              for($j = 0; $j < $cantidadLineas; $j++){
                $vlist[$i][$j] = $list[$j];
              }      
              $i++;
            }
            $dbNamePE = $vlist[0][0];
            unset($vlist);

            mssql_select_db( $dbNamePE );//Conexion a DB correspondiente al Sistema
  */
    }
    /**
     *
     * @return type array
     */
    public function getDocsImprimir(){
        
        /*$sQuery  = " EXEC WSDocs_a_imprimir ".$this->getCodigoDoc();
        $arrList  = $this->oConnection->executeQuery($sQuery);
        return $arrList;*/
        
            // Obtengo datos del Documento
            $query  = " EXEC WSDocs_a_imprimir ".$this->getCodigoDoc();              
            $result = mssql_query($query, $this->connection) OR die ("Error: ".$query."<hr> ".mssql_get_last_message()."<BR>");
            $i=0;
            unset($vlist);
            while ($list = @mssql_fetch_row($result)){
              $cantidadLineas = count($list);
              for($j = 0; $j < $cantidadLineas; $j++){
                $vlist[$i][$j] = $list[$j];
              }      
              $i++;
            }
            $documento = $vlist;
            unset($vlist);            
            return $documento;

    }
    /**
     * @return array
     */
    public function getBloquesDoc(){
        
        /*$sQuery   = " EXEC WSBloquesDocumento ".$this->getCodigoDoc();
        $arrList  = $this->oConnection->executeQuery($sQuery);
        return $arrList;*/
        
           // OBTENGO LOS BLOQUES PARA EL DOCUMENTO   
           $query  = " EXEC WSBloquesDocumento ".$this->getCodigoDoc();
           $result = mssql_query($query, $this->connection) OR die ("Error: ".$query."<hr> ".mssql_get_last_message()."<BR>");
           $j = 0;
           while ($list = @mssql_fetch_row($result)){
             $cantidadLineas = count($list);
             for ($k = 0; $k < $cantidadLineas; $k++){
               $vlist[$j][$k] = $list[$k];
             } 
             $j++;
           }
           $bloques = $vlist;
           unset($vlist);           
           return $bloques;

    }
    /**
     *
     * @param string $query
     * @return array
     */
    public function getCamposBloque( $query ){
        
        /*$sQuery  = $query;
        $arrList = $this->oConnection->executeQuery($sQuery);
        return $arrList;*/
        
           // OBTENGO LOS CAMPOS BLOQUES            
           $result = mssql_query($query, $this->connection) OR die ("Error: ".$query."<hr> ".mssql_get_last_message()."<BR>");
           $j = 0;
           while ($list = @mssql_fetch_row($result)){
             $cantidadLineas = count($list);
             for ($k = 0; $k < $cantidadLineas; $k++){
               $vlist[$j][$k] = $list[$k];
             } 
             $j++;
           }
           $campos = $vlist;
           unset($vlist);          
           return $campos;
    }

}

?>