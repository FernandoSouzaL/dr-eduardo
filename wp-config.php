<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa usar o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Configurações do MySQL - Você pode pegar estas informações com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define( 'DB_NAME', 'wp-eduardo' );

/** Usuário do banco de dados MySQL */
define( 'DB_USER', 'root' );

/** Senha do banco de dados MySQL */
define( 'DB_PASSWORD', '' );

/** Nome do host do MySQL */
define( 'DB_HOST', 'localhost' );

/** Charset do banco de dados a ser usado na criação das tabelas. */
define( 'DB_CHARSET', 'utf8mb4' );

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define( 'DB_COLLATE', '' );

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para invalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '|Jor9v?jI Ki;w|;4wU]HMb$HC00&-PM!:qbbx,=/USk`vv5%hjqyIZ[nI/50m[5' );
define( 'SECURE_AUTH_KEY',  '>hg_B=!_hO-X$|0 xF)`1H>T1%2d4nh]d~!zg?C1)nRFHlVL1>*IK)F*p.1P%aL+' );
define( 'LOGGED_IN_KEY',    'BZ9D$#.b2?KjF/!U.HNwU$&AL#q[hC5pXlZ+{e/W@gW9<=8RA<NPsA#ckbZ]GUz0' );
define( 'NONCE_KEY',        '8(rWtngA#?5[r3,s~EuEo&=koB7[{YJdiOaTY`WX8Uer#VGjjqfA)`DMj`OUK@E3' );
define( 'AUTH_SALT',        'X^**LdwLsb1$w4}haaL X?ML[*Q3gGg4G.9<gMJSA$#4XUyKlD]JHyAx6/4Wt+wz' );
define( 'SECURE_AUTH_SALT', 'v_ZzB(O)8{f`,BXPfaEw5!c{faO]~<y:j*{-|}GewY`PFzR_Q*[0V2a-2z{9.I.-' );
define( 'LOGGED_IN_SALT',   'YPy~9b}MxhJ861L7/3@GgY5:Z0zk/^!cc?m(]0hyC+=@e>LZ8[DKq|mm O|v:R&W' );
define( 'NONCE_SALT',       ')?Rv40/I|<5by&l63VRin?(jpUeJ&4wHwMOH=_1Gg#SKw>3:yl,!oLBE;aI!mO+!' );

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * um prefixo único para cada um. Somente números, letras e sublinhados!
 */
$table_prefix = 'dre_';

/**
 * Para desenvolvedores: Modo de debug do WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Adicione valores personalizados entre esta linha até "Isto é tudo". */



/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Configura as variáveis e arquivos do WordPress. */
require_once ABSPATH . 'wp-settings.php';
