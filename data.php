<?php

/* 	$oAnnonce1 = new Annonce();
  //$oAnnonce1->setID("1");
  $oAnnonce1->setDate("12/05/1984");
  $oAnnonce1->setImg('http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg');
  $oAnnonce1->setTitle("Remorque vélo");
  $oAnnonce1->setDescription("Vélos<br />Aix en provence");
  $oAnnonce1->setPrice("20");

  $oAnnonce2 = new Annonce();
  //$oAnnonce2->setID("2");
  $oAnnonce2->setDate("12/05/1984");
  $oAnnonce2->setImg("http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg");
  $oAnnonce2->setTitle("Remorque vélo");
  $oAnnonce2->setDescription("Vélos<br />Aix en provence");
  $oAnnonce2->setPrice("20");

  $oAnnonce3 = new Annonce();
  //$oAnnonce3->setID("3");
  $oAnnonce3->setDate("12/05/1984");
  $oAnnonce3->setImg("http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg");
  $oAnnonce3->setTitle("Remorque vélo");
  $oAnnonce3->setDescription("Vélos<br />Aix en provence");
  $oAnnonce3->setPrice("20");

  $oAnnonce4 = new Annonce();
  //$oAnnonce4->setID("4");
  $oAnnonce4->setDate("12/05/1984");
  $oAnnonce4->setImg("http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg");
  $oAnnonce4->setTitle("Remorque vélo");
  $oAnnonce4->setDescription("Vélos<br />Aix en provence");
  $oAnnonce4->setPrice("20");
 */

//$mesAnnonces = Annonce::load();
/*
  $mesAnnonces[] = $oAnnonce1;
  $mesAnnonces[] = $oAnnonce2;
  $mesAnnonces[] = $oAnnonce3;
  $mesAnnonces[] = $oAnnonce4;
 */
$mesAnnoncesSide = array();
$mesAnnoncesSide[] = array(
    'date' => 'Aujourd\'hui 15:11',
    'image' => 'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg',
    'titre' => 'Remorque vélo',
    'description' => 'Vélos<br />Aix en provence<br /><br />',
    'prix' => 20
);
$mesAnnoncesSide[] = array(
    'date' => 'Aujourd\'hui 15:11',
    'image' => 'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg',
    'titre' => 'Remorque vélo',
    'description' => 'Vélos<br />Aix en provence<br /><br />',
    'prix' => 20
);
$mesAnnoncesSide[] = array(
    'date' => 'Aujourd\'hui 15:11',
    'image' => 'http://img5.leboncoin.fr/thumbs/08b/08be699689801842b5e4d2a8dc0a37605287df15.jpg',
    'titre' => 'Remorque vélo',
    'description' => 'Vélos<br />Aix en provence<br /><br />',
    'prix' => 20
);

/*$tab = array();
* $tab['ananas@guignole.fr'] = 'azerty';
*$tab['ananas1@guignole.fr'] = 'azerty1';
*$tab['ananas2@guignole.fr'] = 'azerty2';
*$tab['ananas3@guignole.fr'] = 'azerty3';
*$tab['ananas4@guignole.fr'] = 'azerty4';
*$tab['ananas5@guignole.fr'] = 'azerty5';
*/
//sérialisé les objets annacoces et les enregistré dans un fichier txt
/* $file1='data/annonce001.txt';
  file_put_contents($file1,serialize($oAnnonce1));
  $file2='data/annonce002.txt';
  file_put_contents($file2,serialize($oAnnonce1));
  $file3='data/annonce003.txt';
  file_put_contents($file3,serialize($oAnnonce1));
  //File_append creé le fichier
  $file4='data/annonce004.txt';
  file_put_contents($file4,serialize($oAnnonce1),FILE_APPEND);
 */
