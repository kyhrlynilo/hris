<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


/*
*
*	ACTION CODES
*
*/
defined('ACTION_ADD') OR define('ACTION_ADD',0);
defined('ACTION_EDIT') OR define('ACTION_EDIT',1);
defined('ACTION_DELETE') OR define('ACTION_DELETE',2);
defined('ACTION_VIEW') OR define('ACTION_VIEW',3);

/*
*
*	CITIZENSHIP TYPES AND NAMES
*
*/
defined('BIRTH') OR define('BIRTH',"By Birth");
defined('NATURALIZATION') OR define('NATURALIZATION',"Natralization");

defined('DUAL') OR define('DUAL',"Filipino,");
defined('PH') OR define('PH',"Filipino");

defined('EDUC_LEVEL_1') OR define('EDUC_LEVEL_1',"Elementary");
defined('EDUC_LEVEL_2') OR define('EDUC_LEVEL_2',"Secondary");
defined('EDUC_LEVEL_3') OR define('EDUC_LEVEL_3',"Vocational/Trade Cours");
defined('EDUC_LEVEL_4') OR define('EDUC_LEVEL_4',"College");
defined('EDUC_LEVEL_5') OR define('EDUC_LEVEL_5',"Graduate Studies");

/*EMPLOYMENT STATUS & TYPE*/
defined('ES_R') OR define('ES_R',"Regular");
defined('ES_C') OR define('ES_C',"Casual");
defined('ES_PT') OR define('ES_PT',"Part time");
defined('ES_JO') OR define('ES_JO',"Job-order");

defined('ET_A') OR define('ET_A',"Admin");
defined('ET_F') OR define('ET_F',"Faculty");
defined('ET_SA') OR define('ET_SA',"Student Assistant");

defined('DTR') OR define('DTR',"Daily Time Record");
defined('HONO_GR') OR define('HONO_GR',"Hono-graduate");
defined('HONO_UG') OR define('HONO_UG',"Hono-undegraduate");
defined('HONO_SU') OR define('HONO_SU',"Hono-supervisory");

# FOR TIME KEEPING COMPUTATIONS
defined('MONTHS') OR define('MONTHS', ['','January','February','March','April','May','June','July','August','September','October','Novermber','December']);
defined('YEARS') OR define('YEARS', [2016,2017,2018,2019,2020]);
defined('DAYS') OR define('DAYS', ['SUN','MON','TUE','WED','THU','FRI','SAT']);
defined('IN') OR define('IN',"in");
defined('OUT') OR define('OUT',"out");
defined('STANDARD_DATE') OR define('STANDARD_DATE',"Y-m-d");

/*TYPEs OF LEAVE*/
defined('VL') OR define('VL',"Vacation");
defined('TSE') OR define('TSE',"To seek employment");
defined('OTH') OR define('OTH',"Others");
defined('PL') OR define('PL',"Privilege Leave");
defined('SL') OR define('SL',"Sick Leave");
defined('MPL') OR define('MPL',"Maternity/Paternity Leave");

/*TYPES OF WHERE LEAVE WILL BE SPENT*/
defined('LS_WP') OR define('LS_WP',"Within the Philippines");
defined('LS_AB') OR define('LS_AB',"Abroad");
defined('LS_IH') OR define('LS_IH',"In Hospital");
defined('LS_OP') OR define('LS_OP',"Out-patient");

#common
defined('FLAG_YES') OR define('FLAG_YES',"Y");
defined('FLAG_NO') OR define('FLAG_NO',"N");

#user_groups
defined('GROUP_ADMIN') OR define('GROUP_ADMIN',1);
defined('GROUP_MEMBER') OR define('GROUP_MEMBER',2);
defined('GROUP_DEV') OR define('GROUP_DEV',3);
defined('GROUP_EMP') OR define('GROUP_EMP',4);

#tardiness_type
defined('LATE') OR define('LATE','late');
defined('UNDERTIME') OR define('UNDERTIME','undertime');


/*<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
<<<<<<< HEAD
//SAMPLE COMMIT
//test
//tanginamosteve
>>>>>>> 0c0d3278d38fa9a4cb433543f12afc8dde733318
>>>>>>> origin/master
<<<<<<< HEAD

=======

>>>>>>> 38739a41c3128d1b44fbcba565214a315d55f656
*/

