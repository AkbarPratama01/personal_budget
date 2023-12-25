<?php

namespace Composer;

use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-main',
    'version' => 'dev-main',
    'aliases' => 
    array (
    ),
    'reference' => '5de3f66625f08a46c8d1db7c360fddef1a9a3839',
    'name' => 'myvendor/personalbudget',
  ),
  'versions' => 
  array (
    'components/jquery' => 
    array (
      'pretty_version' => 'v3.7.1',
      'version' => '3.7.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8edc7785239bb8c2ad2b83302b856a1d61de60e7',
    ),
    'datatables/datatables' => 
    array (
      'pretty_version' => '1.10.21',
      'version' => '1.10.21.0',
      'aliases' => 
      array (
      ),
      'reference' => '83e59694a105225ff889ddfa0d723a3ab24fda78',
    ),
    'enyo/dropzone' => 
    array (
      'pretty_version' => 'v5.9.3',
      'version' => '5.9.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '286b2dc1f1195bd12169e4c9d5f91cfbe46e245f',
    ),
    'mervick/material-design-icons' => 
    array (
      'pretty_version' => '2.2.0',
      'version' => '2.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '635435c8d3df3a6da3241648caf8a65d1c07cc1a',
    ),
    'monolog/monolog' => 
    array (
      'pretty_version' => '1.27.1',
      'version' => '1.27.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '904713c5929655dc9b97288b69cfeedad610c9a1',
    ),
    'myvendor/personalbudget' => 
    array (
      'pretty_version' => 'dev-main',
      'version' => 'dev-main',
      'aliases' => 
      array (
      ),
      'reference' => '5de3f66625f08a46c8d1db7c360fddef1a9a3839',
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.4',
      'version' => '1.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0.0',
      ),
    ),
    'select2/select2' => 
    array (
      'pretty_version' => '4.1.0-rc.0',
      'version' => '4.1.0.0-RC0',
      'aliases' => 
      array (
      ),
      'reference' => '9ce61fd297fd2922fe771debea8b24dfd219a49a',
    ),
    'twbs/bootstrap' => 
    array (
      'pretty_version' => 'v5.3.2',
      'version' => '5.3.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '344e912d04b5b6a04482113eff20ab416ff01048',
    ),
    'twbs/bootstrap-icons' => 
    array (
      'pretty_version' => 'v1.11.2',
      'version' => '1.11.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '108565f11f099f177b31929e3eafc2c8d497fcd1',
    ),
    'twitter/bootstrap' => 
    array (
      'replaced' => 
      array (
        0 => 'v5.3.2',
      ),
    ),
  ),
);







public static function getInstalledPackages()
{
return array_keys(self::$installed['versions']);
}









public static function isInstalled($packageName)
{
return isset(self::$installed['versions'][$packageName]);
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

$ranges = array();
if (isset(self::$installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = self::$installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', self::$installed['versions'][$packageName])) {
$ranges = array_merge($ranges, self::$installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}





public static function getVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['version'])) {
return null;
}

return self::$installed['versions'][$packageName]['version'];
}





public static function getPrettyVersion($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return self::$installed['versions'][$packageName]['pretty_version'];
}





public static function getReference($packageName)
{
if (!isset(self::$installed['versions'][$packageName])) {
throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}

if (!isset(self::$installed['versions'][$packageName]['reference'])) {
return null;
}

return self::$installed['versions'][$packageName]['reference'];
}





public static function getRootPackage()
{
return self::$installed['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
}
}
