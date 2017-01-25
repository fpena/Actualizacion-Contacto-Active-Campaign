<?php

define("ACTIVECAMPAIGN_URL", "https://cervecerakunstmann.api-us1.com");
define("ACTIVECAMPAIGN_API_KEY", "69c18ada397454a9763f95125b0bf5d0a83af643a68ebf08a0c4fee8f08ebc39878f9a4d");

/*
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
"Fuera de Chile" => "Fuera de Chile"

Para variedades:
"TOROBAYO" => "Torobayo"
"LAGER" => "Lager"
"BOCK" => "Bock"
"LAGER SIN FILTRAR" => "Lager Sin Filtrar"
"ARÁNDANOS" => "Arándano"
"MIEL" => "Miel"
"TRIGO" => "Trigo"
"SIN ALCOHOL" => "Lager Sin Alcohol"
"SOMMER PILS" => "Sommer Pils"
"CHOCOLATE" => "Chocolate"
"ANWANDTER" => "Anwandter"
"DOPPEL BOCK" => "Doppelbock"
"GRAN TOROBAYO" => "Gran Torobayo"
"TOROBAYO SIN FILTRAR" => "Torobayo Sin Filtrar"
"SESSION IPA" => "Session Ipa"

*/

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