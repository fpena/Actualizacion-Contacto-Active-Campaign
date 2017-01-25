<?php

define("ACTIVECAMPAIGN_URL", "https://cervecerakunstmann.api-us1.com");
define("ACTIVECAMPAIGN_API_KEY", "[key]");

require_once("includes/ActiveCampaign.class.php");
$ac = new ActiveCampaign(ACTIVECAMPAIGN_URL, ACTIVECAMPAIGN_API_KEY);
$contact = array(
	"email"	=> "felipe@penya.cl",
	"name" => "Felipe Peña",
	"p[{$list_id}]"      => 1,
	"status[{$list_id}]" => 1, 
	"field[3,0]" =>  "Los Ríos", // Valor región 
	"field[4,0]" =>  "||Torobayo||Lager||" //Valores seleccionados por usuario, separados por || 
);

$contact_sync = $ac->api("contact/sync", $contact);

if (!(int)$contact_sync->success) {
	// request failed
	echo "<p>Error al sincronizar usuario. Error: " . $contact_sync->error . "</p>";
	exit();
}
        
// successful request
$contact_id = (int)$contact_sync->subscriber_id;
echo "<p>Contacto actualizado y sincronizado exitosamente (ID {$contact_id})!</p>";

?>