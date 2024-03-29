<?php
// Constantes définies
define("VALUE_MINIMUM",10000);
define("VALUE_MINIMUM_5",5);


// les expressions régulières
// $lesnombresFlotants
$lesnombresFlotants="/((\d{1,})\.(\d{1,}))/";
// numéros sénégal
$numExpresso="/\b((70)\d{7})\b/";
$numProMobile="/\b((75)\d{7})\b/";
$numFree="/\b((76)\d{7})\b/";
$numOrange1="/\b((77)\d{7})\b/";
$numOrange2="/\b((78)\d{7})\b/";
// fonction qui permet de récupérer un chiffre(ici entier) dans une chaîne de caractères
function filtrerNombre(string $chaine):int{
    $nombre= abs((int)(filter_var($chaine,FILTER_SANITIZE_NUMBER_INT)));
    return $nombre;
}
// fonction défilement suivant
function suivant():string{
    $data=$_SERVER['PHP_SELF'];

    $courant=filtrerNombre($data);
    if (1<=$courant && $courant<17){
        $courant++;
    }else{
        $courant=1;
    }
    $ref='/MES_PROJETS/TP_PHP/exercices/exercice-'.$courant.'/index.php';

    return $ref;
}
// fonction défilement arriere
function arriere():string{
    $data=$_SERVER['PHP_SELF'];
    $courant=filtrerNombre($data);
    if( 1<$courant && $courant<=17){
        $courant--;
    }else {
        $courant=17;
    }
    $ref='/MES_PROJETS/TP_PHP/exercices/exercice-'.$courant.'/index.php';
    
    return $ref;
}
/* FONCTIONS DE CONTRÔLE DE SAISIE DES DONNÉES * 
****************
****************
****************
****************
****************
****************
****************
****************
*/
// fonction qui permet de générer des erreurs suivant la saisie d'un nombre
function validNombre($nbre,string $key,array &$arrError ):void{
    if(empty($nbre)){
        $arrError[$key]="Veillez saisir une valeur";
    }else{
        if(!is_numeric($nbre)){
            $arrError[$key]="Veillez saisir un nombre";
        }
    }
}

// EXO6 fonction qui permet de générer des erreurs suivant la saisie d'un nombre
function validDateItem($nbre,string $key,array &$arrError ):void{
    if(empty($nbre)){
        $arrError[$key]="Veillez saisir une valeur";
    }else{
        if(!is_numeric($nbre)){
            $arrError[$key]="Veillez saisir un nombre";
        }
    }
}
// EXO11 fonction qui permet de générer des erreurs suivant la saisie d'un nombre qui n'est pas supérieur à 10000
function validNombreTenThousand($nbre,string $key,array &$arrError ):void{
    if(empty($nbre)){
        $arrError[$key]="Veillez saisir une valeur";
    }else{
        if(!is_numeric($nbre)){
            $arrError[$key]="Veillez saisir un nombre";
        }
        else{
            if($nbre<VALUE_MINIMUM){
                $arrError[$key]="Veillez saisir un nombre supérieur à 10000";
            }
        }
    }
}
// EXO15 fonction qui permet de générer des erreurs suivant la saisie d'un nombre qui n'est pas supérieur à 10000
function validNombreFive($nbre,string $key,array &$arrError ):void{
    if(empty($nbre)){
        $arrError[$key]="Veillez saisir une valeur";
    }else{
        if(!is_numeric($nbre)){
            $arrError[$key]="Veillez saisir un nombre";
        }
        else{
            if($nbre<VALUE_MINIMUM_5){
                $arrError[$key]="Veillez saisir un nombre supérieur à 5";
            }
        }
    }
}


// fonction réactuliser (pour les exos 1 à 5)
function reActualiser():void{
    $file=$_SERVER['PHP_SELF'];
    $lien='<a href="'.$file.'" class="re-actualiser">Regénérer</a>';
    echo $lien;
}
// fonction Recommencer (pour les autre exos ( 6 à => ) )
function Recommencer():void{
    $file=$_SERVER['PHP_SELF'];
    $courant=filtrerNombre($file);
    $ref='/MES_PROJETS/TP_PHP/exercices/exercice-'.$courant.'/index.php';
    $lien='<a href="'.$ref.'"  class="recommencer">Recommencer</a>';
    echo $lien;
}













