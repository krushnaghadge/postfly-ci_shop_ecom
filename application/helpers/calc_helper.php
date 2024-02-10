<?php

function dis($price,$total_price)
{
	return  (int)(100-($price*100)/$total_price);
	}

    
function number_format1($money)
{
	$money=explode('.', $money)[0];
	$len=strlen($money);
	$m='';
	$money=strrev($money);
	for ($i=0; $i < $len; $i++)
	 { 
		if (($i==3 || ($i>3 && ($i-1)%2==0) )&& $i!=$len )
		{
			$m .=' , ';
		}
		$m .=$money[$i];
	}
	return strrev($m);
}

?> 