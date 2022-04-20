<?php

class Viaje{
    private $codigo;
    private $destino;
    private $cantMaxPasajeros;
    private $pasajerosViaje;

    public function __construct($codigoN, $destinoN, $cantMaxPasajerosN, $pasajerosViajeN)
    {
        $this->codigo=$codigoN;
        $this->destino=$destinoN;
        $this->cantMaxPasajeros=$cantMaxPasajerosN;
        $this->pasajerosViaje=$pasajerosViajeN;
    }
    //gets
    public function getCodigo(){
        return $this->codigo;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getCantMaxPasajeros(){
        return $this->cantMaxPasajeros;
    }
    public function getPasajerosViaje(){
        return $this->pasajerosViaje;
    }
    //"gets" para el array asociativo nombre y apellido
    public function darNombrePasajero($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]['nombre'];
    }
    public function darApellidoPasajero($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]['apellido'];
    }
    public function darNroDeDocPasajero($nroPasajero){
        return ($this->getPasajerosViaje())[$nroPasajero-1]['documento'];
    }

    //sets
    public function setCodigo($codigoN){
        $this->codigo=$codigoN;
    }
    public function setDestino($destinoN){
        $this->destino=$destinoN;
    }
    public function setCantMaxPasajeros($cantMaxPasajerosN){
        $this->cantMaxPasajeros=$cantMaxPasajerosN;
    }
    public function setPasajerosViaje($pasajerosViajeN){
        $this->pasajerosViaje=$pasajerosViajeN;
    }
    //"sets" para modificacion del array pasajeros
    public function cambiarNombrePasajero($nombreN, $nroPasajero){
        $this->pasajerosViaje[$nroPasajero-1]['nombre']=strtoupper($nombreN);
    }
    public function cambiarApellidoPasajero($apellidoN, $nroPasajero){
        $this->pasajerosViaje[$nroPasajero-1]['apellido']=strtoupper($apellidoN);
    }
    public function cambiarDocumentoPasajero($documentoN, $nroPasajero){
        $this->pasajerosViaje[$nroPasajero-1]['documento']=$documentoN;
    }
    //METODOS QUE AGREGUE YO
    public function darDatosPasajero($nroPasajero){
        // muestra datos del pasajero. me dijeron que en los metodos no iba nada de texto a pantalla 
        //pero no sabia donde poner esto
        linea();
        echo "PASAJERO N°: ". $nroPasajero . "\n";
        linea();
        echo "Nombre: ". $this->darNombrePasajero($nroPasajero);
        echo "\nApellido: ". $this->darApellidoPasajero($nroPasajero);
        echo "\nDocumento: ". $this->darNroDeDocPasajero($nroPasajero) . "\n";
    }
    public function mostrarlistaPasajeros(){
        /**muestra la lista de pasajeros */
        $nroDePasajerosN=count($this->getPasajerosViaje());
        $i=1;
        do {
            $this->darDatosPasajero($i);
            $i=$i+1;
        } while ($i <= $nroDePasajerosN);
    }
    public function agregarPasajero($nombreN, $apellidoN, $documentoN){
        /**
         * agrega pasajeros a una lista con pasajeros
         * pushea el nuevo pasajero al array
         */
        $aux=$this->getPasajerosViaje();
        array_push($aux,['nombre'=>$nombreN, 'apellido'=>$apellidoN, 'documento'=>$documentoN]);
        $this->setPasajerosViaje($aux);
    }
    public function reiniciarObj(){
        /**
         * inicia el objeto desde 0
         * si hubiera usado un arrays para guardar viajes lo hubiera hecho distinto
         */
        $pasajeroN[0]=array('nombre' => null, 'apellido'=> null , 'documento'=>null);
        
        $this->setCodigo(null);
        $this->setDestino(null);
        $this->setCantMaxPasajeros(null);
        $this->setPasajerosViaje($pasajeroN);
    }
    public function eliminarPasajero($pasajeroN){
        $nuevoArray=$this->getPasajerosViaje();
        array_splice($nuevoArray, ($pasajeroN-1), 1);
        $this->setPasajerosViaje($nuevoArray);

        echo "\nNueva cantidad de pasajeros: ". count($this->getPasajerosViaje());
    }
    public function __toString()
    {
        return "codigo:". $this->getCodigo().
         "\n". "destino: ". $this->getDestino().
          "\n". "cantidad maxima de pasajeros: " .
           $this->getCantMaxPasajeros(). "\n".// print_r($this->getPasajerosViaje());
           $this->listaDePasajeros();
    }
    public function listaDePasajeros(){
        $listaDePasajeros="";
        $array=$this->getPasajerosViaje();
        foreach ( $array as $key => $value) {
            $listaDePasajeros .= 
            "\nPasajero: n° ". ($key+1) .
            "\nNombre: ". $this->darNombrePasajero($key+1).
            "\nApellido: ". $this->darApellidoPasajero($key+1).
            "\nDocumento: ". $this->darNroDeDocPasajero($key+1). "\n\n";        
        }
        return $listaDePasajeros;
    }

}

function linea(){
    //una linea y salto de linea
    echo "=======================================\n";
}
