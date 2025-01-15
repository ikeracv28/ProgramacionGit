<?php

/**
 * Configura un manejador de errores personalizado que guarde los errores en un archivo errores.log.
 */
ini_set('log_errors', 1);
ini_set('error_log', 'errores.log');
error_log("Esto es un mensaje de error personalizado.");



