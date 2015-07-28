<?php
namespace AppBundle\Controller;
//// dołączamy autoloader
//require './vendor/autoload.php';

// startujemy sesję
session_start();

define('FB_APP_ID', '1234567891234567');
define('FB_APP_SECRET', 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx');
define('FB_APP_REDIRECT_URI', 'http://localhost/GraphApi/fb');



// deklarujemy używane przestrzenie nazw
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Facebook\Facebook;
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphUser;
use Facebook\FacebookRequestException;
use Facebook\FacebookRedirectLoginHelper;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;



class ApiController extends Controller
{
    
 /**
 * @Route("/fb")
 */
    public function apiAction(){

// ustawiamy ID aplikacji i client secret
FacebookSession::setDefaultApplication(FB_APP_ID, FB_APP_SECRET);

// tworzymy helpera do zalogowania się
$helper = new FacebookRedirectLoginHelper(FB_APP_REDIRECT_URI);

// Pobieramy token sesji
try {
  $session = $helper->getSessionFromRedirect();
  // Logowanie...
} catch(FacebookRequestException $ex) {
  // jeśli błąd Facebooka
} catch(\Exception $ex) {
  // jeśli ogólnie błąd
}

if ($session) {
  
  // Zalogowany
  echo 'Logged';

 // pobieramy profil zalogowanego użytkownika
 $user_profile = (new FacebookRequest(
    $session, 'GET', '/me'
  ))->execute()->getGraphObject(GraphUser::className());   

  // obiekt z danymi zalogowanego użytkownika:
  var_dump($user_profile); 
  
} else {

  // Link do logowania
  echo '<a href="'.$helper->getLoginUrl(array( 'email', 'user_friends' )).'">Login</a>';
}
    return $this->render('Api/api.html.twig');
    }
}