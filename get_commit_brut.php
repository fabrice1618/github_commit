<?php
require_once __DIR__ . '/vendor/autoload.php';

# paramétrages
$sCompteGithub = "fabrice1618";
$sRepository = "github_commit";

# Faire la requete à l'API
$client = new \Github\Client();
try {
    $aCommit = $client->api('repo')->commits()->all($sCompteGithub, $sRepository, ['path' => ""]);
    print_r($aCommit);

  } catch (\RuntimeException $e) {
    echo "Erreur acces API Github";
  }
