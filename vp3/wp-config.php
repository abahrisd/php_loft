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
define('DB_NAME', 'turistik');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         'crd>}ApW`Q!077Vsvc2|FlnvUM`bLeabM8#{BcxxPXv|Y#]..dv(kr@xmRb2ZY+6');
define('SECURE_AUTH_KEY',  '*}KRdP>m?8d@IkAo^]$^eaYx/t?0tPW4{S&`F)w ;n2[D}QN<O?%jt6?4Uf[>Deg');
define('LOGGED_IN_KEY',    ',Ay9I&oofbq_OmTcElVYG,lA^~SFt~jGn5zSEK3f4)^a}, p[JW$l9m;OL,S|Ut*');
define('NONCE_KEY',        '71c-9&~Ep-|_hlYpel*OedaMXa`FBOm_>^&.>741KWy@IC ou~D$($nthi@Vx;In');
define('AUTH_SALT',        '*0F]t0EScV!GW=a~!-Z~LNp73-35=M8%3t|jq6w)w{bM=9v-`bO((hgu5=OvZxzv');
define('SECURE_AUTH_SALT', 'XO!ZFdra&Vaf{$>t/uZfZXe##JsSZ:Z^8[T$Zqj_(/yr1;[dL2{5=G/F<#D:e;> ');
define('LOGGED_IN_SALT',   'Vwh|F.D8(tp&Ri1bD8}?R)pa/r4^16 )l,%]G-*)D(^y=>A`CB2_MO&YjXNOwZam');
define('NONCE_SALT',       'Zj6j{DH|}8v}xavw:<|O}|AMD9v,q1VX$88r<EVIC8AL9%2qJ*<Lr%&8DGhQ~a~`');

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
