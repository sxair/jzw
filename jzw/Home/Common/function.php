<?php
function alert($str){
header("Content-type:text/html;charset=utf-8");
echo <<<EOF
<script language='javascript'>
alert("$str");
self.location=document.referrer;
</script>
EOF;
}
function alertgo($str,$time=-1){
header("Content-type:text/html;charset=utf-8");
echo <<<EOF
<script language='javascript'>
alert("$str");
self.location=document.referrer;
</script>
EOF;
}

function getRandChar($length){
   $str = null;
   $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
   $max = strlen($strPol)-1;

   for($i=0;$i<$length;$i++){
    $str.=$strPol[rand(0,$max)];
   }

   return $str;
}

function cut_str($str,$len,$suffix="..."){
        if(function_exists('mb_substr')){
            if(strlen($str) > $len){
                $str= mb_substr($str,0,$len).$suffix;
            }
            return $str;
        }else{
            if(strlen($str) > $len){
                $str= substr($str,0,$len).$suffix;
            }
            return $str;
        }         
}
?>