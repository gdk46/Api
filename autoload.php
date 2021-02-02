<?php

/**
 * Implementação específica do projeto.
 *
 * @param string $ class O nome totalmente qualificado da classe.
 * @return void
 */

function autoload($class)
{
    // directórios especificos para requisição dos namespace
    $base_dir = [
        __DIR__ . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . $class . '.php',
    ];

    // use a quantidade de item do array como referencia, procure
    for ($i = 0; $i < count($base_dir); $i++) {

        // substitua \\ por / no index do directorio base  
        $class = str_replace('\\', DIRECTORY_SEPARATOR, $base_dir[$i]);

        // debugger
        // echo "<br/>".$base_dir[$i]."<br/>";

        // se o arquivo existir e não for um directório, exija-o 
        if (file_exists($class) && !is_dir($class)) {
            include $class;
        }
    }
}

spl_autoload_register('autoload');
