<?php

define("ACTIVECAMPAIGN_URL", "https://cervecerakunstmann.api-us1.com");
define("ACTIVECAMPAIGN_API_KEY", "69c18ada397454a9763f95125b0bf5d0a83af643a68ebf08a0c4fee8f08ebc39878f9a4d");

/*
Para sexo: 
"Masculino" => "Masculino"
"Femenino" => "Femenino"

Para regiones:
"Metropolitana" => "Metropolitana de Santiago"
"I Región" => "Tarapacá"
"II Región" => "Antofagasta"
"III Región" => "Atacama"
"IV Región" => "Coquimbo"
"V Región" => "Valparaíso"
"VI Región" => "O'Higgins"
"VII Región" => "Maule"
"VIII Región" => "Bío Bío"
"IX Región" => "La Araucanía"
"X Región" => "Los Lagos"
"XI Región" => "Aysén"
"XII Región" => "Magallanes"
"XIV Región" => "Los Ríos"
"XV Región" => "Arica y Parinacota"
"Fuera de Chile" => 11.111.111-1 de RUT

*/

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