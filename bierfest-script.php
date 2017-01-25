<?php

define("ACTIVECAMPAIGN_URL", "https://cervecerakunstmann.api-us1.com");
define("ACTIVECAMPAIGN_API_KEY", "[key]");

require_once("includes/ActiveCampaign.class.php");
$ac = new ActiveCampaign(ACTIVECAMPAIGN_URL, ACTIVECAMPAIGN_API_KEY);
$contact = array(
	"email"	=> "felipe@penya.cl",
	"name" => "Felipe Peña",
	"p[7]"      => 7,
	"status[1]" => 1, 
	"field[2,0]" =>  "Femenino", // Valor sexo
	"field[3,0]" =>  "Los Ríos", // Valor región 
	"field[5,0]" =>  "11.111.111-1", // Valor RUT
	"field[6,0]" =>  "Ingeniero", // Valor ocupación
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