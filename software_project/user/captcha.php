<?php
session_start();//���������ǰ��
 $image=imagecreatetruecolor(100, 30);
 $color1=rand(220,255);
 $color2=rand(220,255);
 $color3=rand(220,255);
 $bgcolor=imagecolorallocate($image, $color1, $color2, $color3);//Ϊһ��ͼ�������ɫ
 imagefill($image, 0, 0, $bgcolor);//�������
 /*
 for($i=0;$i<4;$i++){
     $fontsize=6;
     $fontcolor=imagecolorallocate($image, rand(0,120),rand(0,120), rand(0,120));
     $fontcontent=rand(0,9);
     $x=$i*100/4+rand(5,10);
     $y=rand(5,10);
     imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);//����һ���ַ���
 }
 */
 $captch_code='';
 for($i=0;$i<4;$i++){
     $fontsize=6;
     $fontcolor=imagecolorallocate($image, rand(0,120),rand(0,120), rand(0,120));
     $data=join("", array_merge(range("a", "z"), range("A", "Z"), range(0, 9)));
     $fontcontent=substr($data, rand(0,strlen($data)),1);
     $captch_code.=$fontcontent;
     $x=$i*100/4+rand(5,10);
     $y=rand(5,10);
     imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
 }
 $_SESSION['authcode']=$captch_code;
 
 for($i=0;$i<200;$i++){
     $pointcolor=imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
     imagesetpixel($image, rand(1,99),rand(1,29), $pointcolor);//����һ����һ����
 }
 for($i=0;$i<3;$i++){
     $linecolor=imagecolorallocate($image, rand(80,220), rand(80,220), rand(80,220));
     imageline($image, rand(1,99), rand(1,29), rand(1,99), rand(1,29), $linecolor);//����һ���߶�
 }
 header('content-type:image/png');
 imagepng($image);
 imagedestroy($image);