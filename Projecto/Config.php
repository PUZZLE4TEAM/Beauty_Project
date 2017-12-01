<?php
/** App Name **/
define("APP_NAME", "Beauty");

/** DB config */
define("HOST", "localhost");
define("USERNAME", "root");
define("PASSWORD", "");
define("DBNAME", "bd_angohairs");

/** DIR ROOT **/
define("BEAUTY_ROOT", __DIR__);

/** Session config **/
$adr_remote = filter_input(INPUT_SERVER, "REMOTE_ADDR");
$user_agent = filter_input(INPUT_SERVER, "HTTP_USER_AGENT");
$name = APP_NAME.$adr_remote.APP_NAME.$user_agent.APP_NAME;

define('SESSION_COOKIE_NAME' , $name);

define('SESSION_ACCESS' , 'AdmvAccess');
define('SESSION_PERFIL' , 'BeautyPerfil');
define('SESSION_NAME' , 'BeautyUsername');
define('SESSION_ID' , 'BeautyUserId');

/** Handler **/
define("COD_USER_REGISTADO", 3);
define("COD_USER_ADMINISTRADOR", 2);
define("USER_ADMINISTRATIVO", 1);
define("ACTIVADO", "Ativado");
define("BLOQUEADO", "Bloqueado");
define("ESPERA", "Espera");