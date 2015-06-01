<?php

chdir('img');


## attempts to crop if width not divisible by 2.. untested
## http://stackoverflow.com/questions/20847674/ffmpeg-libx264-height-not-divisible-by-2
// $resp = exec('ffmpeg -framerate 1/5 -i test%03d.jpg -vf "scale=trunc(iw/2)*2:trunc(ih/2)*2" -c:v libx264 -r 30 -pix_fmt yuv420p out.mp4');


$resp = exec('ffmpeg -framerate 1/5 -i download%03d.jpg -c:v libx264 -vf "fps=25,format=yuv420p,scale=trunc(iw/2)*2:trunc(ih/2)*2" out3.mp4');



echo 'hooray';



/*

## Convert PowerPoint to images
## http://stackoverflow.com/questions/9548755/powerpoint-ppt-to-jpg-or-png-image-conversion-using-php

apt-get install unoconv
apt-get install imagemagick

## First converts your presentation to PDF
unoconv -f pdf presentation.ppt
## Then convert your PDF to jpg
convert presentation.pdf presentation_%03d.jpg

*/