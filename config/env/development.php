<?php

define('WP_HOME', 'http://project.me');
define('WP_SITEURL', WP_HOME . '/site/');

define('WP_CONTENT_DIR', APP_ROOT . '/public/content');
define('WP_CONTENT_URL', WP_HOME . '/content');

//define('ABSPATH', APP_ROOT . '/public/site/');

define('WP_DEBUG', true);

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'project');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 */
define('AUTH_KEY',         '[{~U<gT8+Y|!oMDLD6]M+95uxS6QXl,ZFu*+-a$-p.Bv(ZAc.dgfvwrHx[YzF1r:');
define('SECURE_AUTH_KEY',  '?!N_7l<9347cy&`|i/ZvS+=.?L1v(aa5i_/<Ob$}-3`]=oU{-uj-*|G%BHOxKc*j');
define('LOGGED_IN_KEY',    '8PGPMzEe-y^LGZH&,26.i]yqWQ+*KBME{`#Y.`9A?-qb%l9TFzZ=8-:*`_Cw[UBW');
define('NONCE_KEY',        'Z{[o2!tND/}>5C 2J+;Cne:x5:=U){m&()HTPpH(kgE2o+^-zJZmA6}QRZ]7V #e');
define('AUTH_SALT',        'e*q& C)*hcEs|?MF>Trm~EtR}nS6mQqN9ijBHst4Cv%6.JIw<V[1ah(o!#F!1pHl');
define('SECURE_AUTH_SALT', ':t2E7hgp^RQcn>wiZznrApNY].QKRl6IwdbHC}J%RWq*]vrP.!UPuNaRr2C9PA0b');
define('LOGGED_IN_SALT',   '9[+phOO,AJ7[)`F(d-kx[<Znwu(P5z{HaY+-v,*fI?2-nWxAs<rgK=)7-jx_y[c=');
define('NONCE_SALT',       '1T2#[U-|I.4[aYh<A3_~Xt-.|lszlt^%?na(t^/+gZy=_]46J=dMG.eh_g=zk3cT');
/**#@-*/