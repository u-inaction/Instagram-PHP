<?php 

class Instagram {
	public static function getFeed($client_id, $tag ,$count)
	{
		//CURL INSTAGRAM
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://api.instagram.com/v1/tags/".$tag."/media/recent?client_id=".$client_id."&count=".$count."");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);//need for ssl
        curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);//need for ssl

        $output = curl_exec($ch);
        if ($output === FALSE) {
            $instagram=array();
        }else
        {
            //print_r( json_decode($output)->data[0]->images->standard_resolution->url);
             $instagram=json_decode($output)->data;
        }

        curl_close($ch);
        //CURL INSTAGRAM
        ////////////////   

        return $instagram;
	}
}
?>