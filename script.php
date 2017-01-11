<?php
define("ACTIVECAMPAIGN_URL", "API_URL");
define("ACTIVECAMPAIGN_API_KEY", "API_KEY");
require_once("includes/ActiveCampaign.class.php");
$ac = new ActiveCampaign(ACTIVECAMPAIGN_URL, ACTIVECAMPAIGN_API_KEY);



?>