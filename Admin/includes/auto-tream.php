<?php /* *********************************************************
* Auto-trim Text to Image v1.3
*  A slower but more asthetic improvement over using imagettfbbox
* Copyright (C) 2004-2009 GreyWyvern
*
* This program may be distributed under the terms of the GPL
*   - http://www.gnu.org/licenses/gpl.txt
*
*       !! Requires GD 2.0.8+ or bundled equivalent !!
*
* Changelog:
*  1.3 - Changed the way initial box dimensions are calculated
*      - Increased speed and reliability
*
*  1.2 - Fixed black lines which occasionally appeared at angles:
*          0, 90, 180 and 270
*      - Small speed tweak
*
*  1.1 - Better handling of angled text and borders
*      - Added angle parameter
*      - Added border parameter
*
* Set the default variables below.
*  - $font: The full server path to your font file
*  - $point: Default point size for text
*  - $angle: Text Angle
*  - $border: pixels of background colour to leave around text
*  - $ratio['x']: squish or stretch horizontally
*  - $ratio['y']: squish or stretch vertically
*  - $color['text']: Default text colour
*  - $color['back']: Default background colour
*
* Call this script using an HTML <img> tag like so:
*
* <img src="path/to/script/auto-trim.php?text=Text" />
*
*  - It is recommended that you set the alt attribute to the text
* string of the image: alt="Text" />
*
*  - You can also add up to five optional arguments which can be
* placed in any order.  These arguments will override the
* defaults:
*    1) &size=##
*      Font Size: ## is the desired point size for text.
*    2) &angle=##
*      Font Angle: Desired rotation angle for text.
*    3) &border=##
*      Image Border Width: Desired border width (in pixels) of
*      background colour to leave around the text
*    4) &tcol=123abc
*      Text Colour: 123abc is a hex colour code without the
*      preceeding #.
*    5) &bcol=123abc
*      Background Colour: 123abc is a hex colour code without the
*      preceeding #.
*
* An example request might look like:
*  /auto-trim.php?text=Hello&size=12&tcol=45e29c&bcol=99006e
*
* See the inline comments and http://www.greywyvern.com/php for
* more info
*************************************************************** */


/* ***** Set Default Variables ******************************* */
$font = "/path/to/your/font.ttf";
$point = 18;
$angle = 0;
$border = 1;
$ratio['x'] = 1;
$ratio['y'] = 1;
$color['text'] = array(0, 0, 0);
$color['back'] = array(255, 255, 255);


/* ***** Set Variables From $_GET data *********************** */
$text = (isset($_GET['text'])) ? trim(rawurldecode($_GET['text'])) : "Auto-trim 1.3";

if (isset($_GET['size'])) $point = trim(rawurldecode($_GET['size']));
if (isset($_GET['angle'])) $angle = trim(rawurldecode($_GET['angle']));
if (isset($_GET['border'])) $border = trim(rawurldecode($_GET['border']));

if (isset($_GET['tcol']) && preg_match("/[0-9a-f]{6}/i", $_GET['tcol']))
  $color['text'] = array(hexdec(substr($_GET['tcol'], 0, 2)), hexdec(substr($_GET['tcol'], 2, 2)), hexdec(substr($_GET['tcol'], 4, 2)));

if (isset($_GET['bcol']) && preg_match("/[0-9a-f]{6}/i", $_GET['bcol']))
  $color['back'] = array(hexdec(substr($_GET['bcol'], 0, 2)), hexdec(substr($_GET['bcol'], 2, 2)), hexdec(substr($_GET['bcol'], 4, 2)));


/* ***** Prepare Initial Image ******************************* */
header("Content-type: image/png");

$size = imagettfbbox($point, $angle, $font, $text);

for ($x = 0, $mn = array(0, 0); $x < count($size); $x += 2)
  $mn = array(min($mn[0], $size[$x]), min($mn[1], $size[$x + 1]));

for ($x = 0, $mx = array(0, 0); $x < count($size); $x += 2)
  $mx = array(max($mx[0], $size[$x] += abs($mn[0])), max($mx[1], $size[$x + 1] += abs($mn[1])));

$im = imagecreatetruecolor($mx[0] + $border * 2 + $point * 2, $mx[1] + $border * 2 + $point * 2);

$tc = imagecolorallocate($im, $color['text'][0], $color['text'][1], $color['text'][2]);
$bgc = imagecolorallocate($im, $color['back'][0], $color['back'][1], $color['back'][2]);

imagefill($im, 0, 0, $bgc);
imagettftext($im, $point, $angle, $border + $point + abs($mn[0]), $border + $point + abs($mn[1]), $tc, $font, $text);


/* ***** Trim To Text **************************************** */
for ($x = 0; $x < imagesx($im); $x++) {
  for ($y = 0; $y < imagesy($im); $y++) {
    if (!isset($itrim['left'])) {
      $rgb = imagecolorat($im, $x, $y);
      $r = ($rgb >> 16) & 0xFF;
      $g = ($rgb >> 8) & 0xFF;
      $b = $rgb & 0xFF;
      if (array($r, $g, $b) != $color['back']) $itrim['left'] = $x - $border;
    }
    if (!isset($itrim['right'])) {
      $rgb = imagecolorat($im, imagesx($im) - $x - 1, imagesy($im) - $y - 1);
      $r = ($rgb >> 16) & 0xFF;
      $g = ($rgb >> 8) & 0xFF;
      $b = $rgb & 0xFF;
      if (array($r, $g, $b) != $color['back']) $itrim['right'] = imagesx($im) - $x + $border;
    }
  }
}

for ($y = 0; $y < imagesy($im); $y++) 
{
  for ($x = 0; $x < imagesx($im); $x++) 
  {
    if (!isset($itrim['top'])) 
	{
      $rgb = imagecolorat($im, $x, $y);
      $r = ($rgb >> 16) & 0xFF;
      $g = ($rgb >> 8) & 0xFF;
      $b = $rgb & 0xFF;
      if (array($r, $g, $b) != $color['back']) $itrim['top'] = $y - $border;
    }
    if (!isset($itrim['bottom'])) 
	{
      $rgb = imagecolorat($im, imagesx($im) - $x - 1, imagesy($im) - $y - 1);
      $r = ($rgb >> 16) & 0xFF;
      $g = ($rgb >> 8) & 0xFF;
      $b = $rgb & 0xFF;
      if (array($r, $g, $b) != $color['back']) $itrim['bottom'] = imagesy($im) - $y + $border;
    }
  }
}

$im2 = imagecreatetruecolor(($itrim['right'] - $itrim['left']) * $ratio['x'], ($itrim['bottom'] - $itrim['top']) * $ratio['y']);
$bgc2 = imagecolorallocate($im2, $color['back'][0], $color['back'][1], $color['back'][2]);

imagecopyresampled($im2, $im, 0, 0, $itrim['left'], $itrim['top'], imagesx($im2), imagesy($im2), $itrim['right'] - $itrim['left'], $itrim['bottom'] - $itrim['top']);
imagefill($im2, 0, 0, $bgc2);


/* ***** Output Image **************************************** */
imagepng($im2);
imagedestroy($im2);
imagedestroy($im);

?>