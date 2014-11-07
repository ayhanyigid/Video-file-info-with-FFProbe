Video file info with FFProbe
=============================

Video file info with FFProbe in PHP

How can use this:

Example 1:
  require('Video_Info.class.php');
  $file = '/home/uploads/tmp/video.mp4';
  $result = Video_Info::create($file)->video();
  echo '<pre>'.print_r($result,1).'</pre>';
  
  
Example 2:
require('Video_Info.class.php');
$file = '/home/uploads/tmp/video.mp4';
$result = Video_Info::create($file)
    ->options('-v')
    ->options('quiet')
    ->options('-show_format')
    ->options('-print_format')
    ->options('json')
    ->video();
echo '<pre>'.print_r($result,1).'</pre>';   


If you need to help for this so you can send a email to me.

Bu class ffprobe ile beraber kullanılmaktadir. This class is working with ffprobe.

Could you send a comment for this. Yorum ve önerileriniz bekliyorum.. Thanks,

ayigid[at]hotmail.com

