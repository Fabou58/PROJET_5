<?php

/* Fichiers de configuration */
require('conf/settings.php');		// Configuration de l'accès à la base de données

/* Librairies */
require('lib/database.lib.php');	// Classe de la base de données

/* Classes */
require('models/[personne].class.php');
require('models/[meuble].class.php');
require('models/[visite].class.php');
require('models/[adresse].class.php');
require('models/[role].class.php');
require('models/[type_meuble].class.php');
require('models/[type_vente].class.php');
require('models/[type_bien].class.php');
?>