<?php 


include_once("abstract.databoundobject.php");

class Logdata extends DataBoundObject {

        protected $ID;
        protected $Message;
        protected $Loglevel;
        protected $Logdate;
	protected $Module;



        protected function DefineTableName() {
                return("logdata");
        }

        protected function DefineRelationMap() {
                return(array(
                        "id" => "ID",
                        "message" => "Message",
                        "loglevel" => "Loglevel",
                        "logdate" => "Logdate",
			"module" => "Module"));
        }
}

?>