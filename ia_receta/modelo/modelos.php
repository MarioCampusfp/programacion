<?php 
require_once __DIR__ . '/../config/conexion.php';

class receta{

    private $conexion;

    //funcion para conectar a la base de datos
    public function __construct(){
        $this->conexion = new conexion();
    }

    //funcion para listar las recetas
    public function listar_recetas(){
        $query = "SELECT * FROM recetas";
        $result = $this->conexion->conexion->query($query);
        $data = [];
        if($result) {
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
        }
        return $data;
    }

    //funcion para agregar una receta
    public function agregar_receta($nombre, $ingredientes, $elaboracion, $descripcion){
        $query = "INSERT INTO recetas (nombre, ingredientes, elaboracion, descripcion) VALUES (?,?,?,?)";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssss",$nombre,$ingredientes,$elaboracion,$descripcion);

        //comprobacion de que la receta se a creado corectamente
        if ($stmt->execute()){
            echo "receta añadida correcta mente";
        } else {
            echo "error al agregar la receta: ". $stmt->error;
        }

        $stmt->close();
    }

    //funcion para eliminar una receta
    public function eliminar_receta($id_receta){
        $query = "DELETE FROM recetas WHERE id_receta = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("i",$id_receta);

        //comprobacion de que la receta se a eliminado corectamente
        if ($stmt->execute()){
            echo "receta eliminada correcta mente";
        } else {
            echo "error al eliminar la receta: ". $stmt->error;
        }

        $stmt->close();
    }

    //funcion para modificar una receta
    public function modificar_receta($id_receta, $nombre, $ingredientes, $elaboracion, $descripcion){
        $query = "UPDATE recetas SET nombre = ?, ingredientes = ?, elaboracion = ?, descripcion = ? WHERE id_receta = ?";
        $stmt = $this->conexion->conexion->prepare($query);
        $stmt->bind_param("ssssi",$nombre,$ingredientes,$elaboracion,$descripcion,$id_receta);

        //comprobacion de que la receta se a modificado corectamente
        if ($stmt->execute()){
            echo "receta modificada correcta mente";
        } else {
            echo "error al modificar la receta: ". $stmt->error;
        }

        $stmt->close();
    }

}

class ia {

    private $puerto;
    private $url;

    public function __construct($puerto = '1234'){
        $this->puerto = $puerto;
        $this->url = "http://localhost:" . $this->puerto . "/v1/chat/completions";
    }
    
    // Envía una petición a la IA con un prompt dado y retorna la respuesta
    public function enviar_peticion($prompt, $model = "llama-3.2-1b-instruct", $temperature = 0.7, $max_tokens = -1, $stream = false) {
        $datos = array(
            "model" => $model,
            "messages" => array(
                array("role" => "system", "content" => "Responde siempre en español"),
                array("role" => "user", "content" => $prompt)
            ),
            "temperature" => $temperature,
            "max_tokens" => $max_tokens,
            "stream" => $stream
        );
        $jsonDatos = json_encode($datos);
        $ch = curl_init($this->url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDatos);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonDatos)
        ));
        $respuesta = curl_exec($ch);
        curl_close($ch);
        
        if($respuesta) {
            $data = json_decode($respuesta, true);
            return $data['choices'][0]['message']['content'] ?? "";
        }
        return "";
    }
}