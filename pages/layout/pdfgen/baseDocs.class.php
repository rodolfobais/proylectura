<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of baseDocs
 *
 * @author jcastelli
 */
class baseDocs {
    
    private $iSubsiniestro;
    private $iTramite;
    private $iSiniestro;
    private $iItem;
    private $iOrden;
    private $iIdProveedor;
    private $iCodDoc;
    private $codBloq;
    
     /**
     *
     * @return type integer;
     */
    public function getSubSiniestro(){
        return $this->iSubsiniestro;
    }
    /**
     *
     * @return type integer;
     */
    public function getTramite(){
        return $this->iTramite;
    }
    /**
     *
     * @return type integer;
     */
    public function getSiniestro(){
        return $this->iSiniestro;
    }
    /**
     *
     * @return type integer;
     */
    public function getItem(){
        return $this->iItem;
    }
    /**
     *
     * @return type integer;
     */
    public function getOrden(){
        return $this->iOrden;
    }
    /**
     *
     * @return type integer;
     */
    public function getProveedor(){
        return $this->iIdProveedor;
    }
    /**
     *
     * @return type integer;
     */
    public function getCodigoDoc(){
        return $this->iCodDoc;
    }
    
    public function getCodigoBloq(){
       return $this->codBloq;
    }
    
    public function setSubSiniestro($subsiniestro){
        $this->iSubsiniestro = $subsiniestro;
    }
    
    public function setTramite($tramite){
        $this->iTramite = $tramite;
    }
    
    public function setSiniestro($siniestro){
        $this->iSiniestro = $siniestro;
    }
    
    public function setItem($item){
        $this->iItem = $item;
    }
    
    public function setOrden($orden){
        $this->iOrden = $orden;
    }
    
    public function setProveedor($idProveedor){
        $this->iIdProveedor = $idProveedor;
    }
    
    public function setCodigoDoc($codDoc){
        $this->iCodDoc = $codDoc;
    }
    
    public function setCodigoBloq($codBloq){
        $this->codBloq = $codBloq;
    }
    
}

?>
