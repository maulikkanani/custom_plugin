<?php
# Database Configuration
define( 'DB_NAME', 'wp_kochandhill' );
define( 'DB_USER', 'kochandhill' );
define( 'DB_PASSWORD', '3UNBCpmniyjgnarVArpJ' );
define( 'DB_HOST', '127.0.0.1' );
define( 'DB_HOST_SLAVE', '127.0.0.1' );
define('DB_CHARSET', 'utf8');
define('DB_COLLATE', 'utf8_unicode_ci');
$table_prefix = 'wp_';

# Security Salts, Keys, Etc
define('AUTH_KEY',         'aguNCH+f(^Vg&-~x_8~ne_f&7@LT@K~,v[VLHwxjNqMFP|&.z5Cmzb**^G)@}6({');
define('SECURE_AUTH_KEY',  '^>1Ae<mUY;{(|Ycl7WF$Ku(~a4e[~)JV4R:GY~WC$PDm7/:3YGl</(qa;2?|Qd+f');
define('LOGGED_IN_KEY',    'L1u2wC&,#+g{u[H8y5C)u%VI|0>OuKF+JTt8[IP}1kRam]:D[J|W2O:ZQbR?Hg*G');
define('NONCE_KEY',        'N-YkL3>w^+6 ThaeBwQL*<_s[-{@>l)@%B-xN`a/qfpq[Jj9QUpkb4qQ02CGQ?Dc');
define('AUTH_SALT',        'B;)taddX+N:MK_v[,XmoqJF=Azu9a?a`C0|>fv8&[r`{SIyyr&7ru_,}ns?h[zV,');
define('SECURE_AUTH_SALT', 'v+Scqtq=z4<NTU dxp1en?mKyj@*I-m*E}AE`;L8loB#0{>u)~zzL8+-HSinQ5d+');
define('LOGGED_IN_SALT',   'Ail :7}[f)TwdB&M_(skA0bM!Jk#SmQ+8<4t {H_&M)$NW&vo~f+a sJCG~|zXe+');
define('NONCE_SALT',       '@}jNzALjq}ANs-DS<eFSis ?M9/d?g9OS+#[!<)C:ZYz;_0o%r(5{ jdTCk[>V5F');


# Localized Language Stuff

define( 'WP_CACHE', TRUE );

define( 'WP_AUTO_UPDATE_CORE', false );

define( 'PWP_NAME', 'kochandhill' );

define( 'FS_METHOD', 'direct' );

define( 'FS_CHMOD_DIR', 0775 );

define( 'FS_CHMOD_FILE', 0664 );

define( 'PWP_ROOT_DIR', '/nas/wp' );

define( 'WPE_APIKEY', '0ce4cbd1a510a8dfcc5065be1fa702ba45445179' );

define( 'WPE_FOOTER_HTML', "" );

define( 'WPE_CLUSTER_ID', '3023' );

define( 'WPE_CLUSTER_TYPE', 'pod' );

define( 'WPE_ISP', true );

define( 'WPE_BPOD', false );

define( 'WPE_RO_FILESYSTEM', false );

define( 'WPE_LARGEFS_BUCKET', 'largefs.wpengine' );

define( 'WPE_CACHE_TYPE', 'generational' );

define( 'WPE_LBMASTER_IP', '96.126.96.236' );

define( 'WPE_CDN_DISABLE_ALLOWED', true );

define( 'DISALLOW_FILE_EDIT', FALSE );

define( 'DISALLOW_FILE_MODS', FALSE );

define( 'DISABLE_WP_CRON', false );

define( 'WPE_FORCE_SSL_LOGIN', false );

define( 'FORCE_SSL_LOGIN', false );

/*SSLSTART*/ if ( isset($_SERVER['HTTP_X_WPE_SSL']) && $_SERVER['HTTP_X_WPE_SSL'] ) $_SERVER['HTTPS'] = 'on'; /*SSLEND*/

define( 'WPE_EXTERNAL_URL', false );

define( 'WP_POST_REVISIONS', FALSE );

define( 'WPE_WHITELABEL', 'wpengine' );

define( 'WP_TURN_OFF_ADMIN_BAR', false );

define( 'WPE_BETA_TESTER', false );

umask(0002);

$wpe_cdn_uris=array ( );

$wpe_no_cdn_uris=array ( );

$wpe_content_regexs=array ( );

$wpe_all_domains=array ( 0 => 'kochandhill.wpengine.com', 1 => 'kochandhill.com', 2 => 'www.kochandhill.com', );

$wpe_varnish_servers=array ( 0 => 'pod-3023', );

$wpe_special_ips=array ( 0 => '96.126.96.236', );

$wpe_ec_servers=array ( );

$wpe_largefs=array ( );

$wpe_netdna_domains=array ( );

$wpe_netdna_domains_secure=array ( );

$wpe_netdna_push_domains=array ( );

$wpe_domain_mappings=array ( );

$memcached_servers=array ( );
define('WPLANG','');

# WP Engine ID


define('PWP_DOMAIN_CONFIG', 'www.kochandhill.com' );

# WP Engine Settings






# That's It. Pencils down
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
require_once(ABSPATH . 'wp-settings.php');

$_wpe_preamble_path = null; if(false){}
