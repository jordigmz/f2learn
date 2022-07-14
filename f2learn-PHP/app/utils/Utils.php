<?php

namespace f2learn\app\utils;

class Utils
{
    public static function esOpcionMenuActiva(string $opcionMenu) : bool
    {
        if($_SERVER['REQUEST_URI'] === "/$opcionMenu")
            return true;
        return false;
    }

    public static function existeOpcionMenuActivaEnArray(array $opcionesMenu) : bool
    {
        foreach ($opcionesMenu as $opcionMenu)
        {
            if(self::esOpcionMenuActiva($opcionMenu) === true)
                return true;
        }
        return false;
    }

    public static function obtenerArrayReducido(array &$arrReducir, int $numElementosReduccion) : array
    {
        shuffle($arrReducir);

        $trozos = array_chunk($arrReducir, $numElementosReduccion);

        return $trozos[0];
    }
}