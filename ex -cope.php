<!DOCTYPE HTML>
<html>
 <head>
  <meta charset="utf-8">
  <title>Тег FORM, атрибут accept-charset</title>
 </head>
 <body>
<?php
include('simple_html_dom.php');   

function bineks_cron_horoscope_parser(){
    $znaki = array("aries","taurus","gemini","cancer","leo","virgo","libra","scorpio","sagittarius","capricorn","aquarius","pisces");
    $goroscope = array();
    $j=0;
    for ($i=0; $i<=11; $i++){
        $html = file_get_html('http://horoscopes.rambler.ru/'. $znaki[$i] .'/');
        //$html = file_get_html('http://horoscopes.rambler.ru/aries/');
        $element1 = $html->find('td a');
        $element2 = $html->find('div, p');
        $goroscope[$i+$j]=$element1[$i+1];
        $j++;
        $goroscope[$i+$j]=$element2[30];


    }
    return $goroscope;
}
$gor = bineks_cron_horoscope_parser();
foreach ($gor as $v){
	echo "$v\n";
}
?> 
</body>
</html>
