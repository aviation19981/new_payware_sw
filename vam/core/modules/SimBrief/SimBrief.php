<?php

   // class SimBrief extends CodonModule
   // {


        public function indexa()
        {


            $url = 'http://www.simbrief.com/ofp/flightplans/xml/'.$this->get->ofp_id.'.xml';
            $xml = simplexml_load_file($url);
            $this->set('info', $xml);
            $this->render('../vam/avianca_dispatch.php?'); 
            //print_r($xml);
        }
//}

?>