<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'firstWp');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'sA1$}86pH3[RFVJ?z1{~nmo[>:V^28zWyVU,C`_%zy53GSF>fX<WqxC=,FMl3Tve');
define('SECURE_AUTH_KEY',  'Q8;C30Bm=[9OX7-m+Zp#r<h~ ].=UoP;yjmvZ*sa[=>(2ZS!o|ni_bx2FXI(;W;v');
define('LOGGED_IN_KEY',    'jig.EUGVvu4[;`~J:KXp3Q3~CkHaJ5FELJo_]g%SKWu$nn:8cQ]t!;fa7-<<6+Hm');
define('NONCE_KEY',        'JT&F.gfcxGQU69WJtA5Du`m!<&&|+/P$_./ns Q/-OG@BrXq@U-6_z:Xz6*k[ML+');
define('AUTH_SALT',        'O}`>gpoev2Y1wxvKx3{2w/%w=7`PNMkcvpD99[JX6G=WE+p`WB?j1:uMj_sN 0SW');
define('SECURE_AUTH_SALT', '0N#1Be{.pC6WtqB u~]}r McFpf.{?;bKSf/{)}<hQ];$VQNn9$d.6me>._v_xlY');
define('LOGGED_IN_SALT',   '`n>husvKxO+!ZRLk-rMR.Y&%.OsdmLd`[A<fZF4&^;%!hb/t3>8qpU9|cYabj,]Q');
define('NONCE_SALT',       'b>pI`T)85u@;tv,km9. b_FA-0LuGqcMR0J(9NaWEOB)Y252WujseTjcFO2HQ39)');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
