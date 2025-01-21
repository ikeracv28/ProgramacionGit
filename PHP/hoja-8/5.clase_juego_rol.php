<?php
/*
5. Clase "Juego de Rol":
Crea una clase Personaje con las propiedades nombre, nivel, puntosVida y puntosAtaque.
Agrega los métodos:
atacar(Personaje $objetivo): Resta puntos de vida al personaje objetivo en función de los puntos de ataque.
curarse(): Restaura puntos de vida al personaje.
subirNivel(): Incrementa el nivel y mejora los puntos de ataque y vida.
Crea varios personajes y simula una pequeña batalla con ataques y curaciones.


/* MANERA DE HACERLO POR MI CUENTA, PERO LA BATALLA NO ACABA
class personaje{
    private $nombre;
    private $nivel;
    private $puntosVida;
    private $puntosAtaque;

    public function __construct($nombre_ext, $nivel_ext, $puntosVida_ext, $puntosAtaque){
        $this->nombre = $nombre_ext;
        $this->nivel = $nivel_ext;
        $this->puntosVida = $puntosVida_ext;
        $this->puntosAtaque = $puntosAtaque;
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre_ext){
        $this->nombre = $nombre_ext;
    }
    public function getNivel(){
        return $this->nivel;
    }
    public function setNivel($nivel_ext){
        $this->nivel = $nivel_ext;
    }
    public function getPuntosVida(){
        return $this->puntosVida;
    }
    public function setPuntosVida($puntosVida_ext){
        $this->puntosVida = $puntosVida_ext;
    }
    public function getPuntosAtaque(){
        return $this->puntosAtaque;
    }
    public function setPuntosAtaque($puntosAtaque_ext){
        $this->puntosAtaque = $puntosAtaque_ext;
    }
    public function atacar(Personaje $objetivo){
        echo $this->nombre . " se encuentra y ataca a " . $objetivo->getNombre() . " causandole ". $this->puntosAtaque . " de daño.   \n";
        $vidaRestante = $objetivo -> getPuntosVida() - $this->puntosAtaque;
        $objetivo->setPuntosVida(max($vidaRestante, 0));
        echo "Ahora " . $objetivo->getNombre(). " tiene: " . $objetivo->getPuntosVida() . " puntos de vida \n";
    }
    public function curarse(){
        $curacion = rand(50, 100);
        echo $this->nombre . " se cura " . $curacion . " puntos de vida.\n";
        $this->setPuntosVida($this->getPuntosVida() + $curacion);
        echo "Ahora {$this->nombre} tiene {$this->getPuntosVida()} puntos de vida.\n";
    }
        /* OTRA MANERA DE HACERLO
    public function curarse(){
        echo "Tu salud es de " . $this->puntosVida . "\n";
        $curacion = rand(50,100);
        $this->puntosVida += $curacion;
        echo "Despues de curarte, tu vida es de: " . $this->puntosVida . "\n";
    }
        
    

    public function subirNivel(){
        echo "{$this->nombre} sube de nivel.\n";
        $incrementarNivel = rand(20,50);
        $this->nivel +=1;
        $this->setPuntosAtaque($this->getPuntosAtaque() + $incrementarNivel);
        $this->setPuntosVida($this->getPuntosVida() + $incrementarNivel);
        echo $this->nombre . " ha subido al nivel:  " . $this->nivel . ", tus puntos de vida a " . $this->getPuntosVida()  . ", tus puntos de ataque a : " . $this->getPuntosAtaque() . "\n";
    }
}

$iker = new Personaje("Iker", 1, 500, 50);
$rafa = new Personaje("Rafa", 1, 300, 70);

echo "¡Comienza la batalla entre {$iker->getNombre()} y {$rafa->getNombre()}!\n\n";

$iker->atacar($rafa);
$rafa->curarse();
$rafa->atacar($iker);
$iker->subirNivel();
$rafa->subirNivel();

echo "\nEstado final:\n";
echo "{$iker->getNombre()} tiene {$iker->getPuntosVida()} puntos de vida.\n";
echo "{$rafa->getNombre()} tiene {$rafa->getPuntosVida()} puntos de vida.\n";

*/

/* MANERA DE HACERLO PARA QUE LA BATALLA ACABE CUANDO UNO DE LOS DOS SU VIDA SEA 0 */
class Personaje {
    private $nombre;
    private $nivel;
    private $puntosVida;
    private $puntosAtaque;

    public function __construct($nombre_ext, $nivel_ext, $puntosVida_ext, $puntosAtaque) {
        $this->nombre = $nombre_ext;
        $this->nivel = $nivel_ext;
        $this->puntosVida = $puntosVida_ext;
        $this->puntosAtaque = $puntosAtaque;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPuntosVida() {
        return $this->puntosVida;
    }

    public function atacar(Personaje $objetivo) {
        echo "{$this->nombre} ataca a {$objetivo->getNombre()} y causa {$this->puntosAtaque} de daño.\n";
        $objetivo->puntosVida -= $this->puntosAtaque;

        if ($objetivo->puntosVida <= 0) {
            $objetivo->puntosVida = 0;
            echo "{$objetivo->getNombre()} ha caído en combate.\n";
        } else {
            echo "{$objetivo->getNombre()} tiene ahora {$objetivo->getPuntosVida()} puntos de vida.\n";
        }
    }

    public function curarse() {
        $curacion = rand(30, 70);
        $this->puntosVida += $curacion;
        echo "{$this->nombre} se cura {$curacion} puntos de vida. Ahora tiene {$this->puntosVida} puntos de vida.\n";
    }

    public function subirNivel() {
        $incrementoAtaque = rand(20, 40);
        $incrementoVida = rand(50, 100);

        $this->nivel++;
        $this->puntosAtaque += $incrementoAtaque;
        $this->puntosVida += $incrementoVida;

        echo "{$this->nombre} ha subido al nivel {$this->nivel}! Sus puntos de ataque aumentan a {$this->puntosAtaque} y sus puntos de vida a {$this->puntosVida}.\n";
    }
}

// Crear personajes
$iker = new Personaje("Iker", 1, 500, 50);
$rafa = new Personaje("Rafa", 1, 300, 70);

// Inicia la batalla
echo "¡Comienza la batalla entre {$iker->getNombre()} y {$rafa->getNombre()}!\n\n";

$turno = 1;
while ($iker->getPuntosVida() > 0 && $rafa->getPuntosVida() > 0) {
    echo "=== Turno {$turno} ===\n";
    
    // Turno de Iker
    $iker->atacar($rafa);

    if ($rafa->getPuntosVida() <= 0) {
        break;
    }

    // Turno de Rafa
    $rafa->curarse();
    $rafa->atacar($iker);

    if ($iker->getPuntosVida() <= 0) {
        break;
    }

    echo "\n";
    $turno++;
}

// Determinar ganador y subir nivel
if ($iker->getPuntosVida() > 0) {
    echo "\n¡{$iker->getNombre()} es el ganador!\n";
    $iker->subirNivel();
} else {
    echo "\n¡{$rafa->getNombre()} es el ganador!\n";
    $rafa->subirNivel();
}

