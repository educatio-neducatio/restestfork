<?php

namespace Acme\DemoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Acme\DemoBundle\Form\ContactType;

// these import the "@Route" and "@Template" annotations
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * @Route("/restclient")
 */
class RestClientController extends Controller
{
  /**
   * @Route("/user/{id}")
   * 
   * @param type $id 
   */
  public function getUserAction($id)
  {
    $service_url = "http://192.168.103.55/mstrzelczyk/resttest/web/users/{$id}";
       $curl = curl_init($service_url);
       curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
       curl_setopt($curl, CURLOPT_POST, false);
       //curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
       $curl_response = curl_exec($curl);
       curl_close($curl);
    return new Response($curl_response);
  }
  /**
   * @Route("/createuser/{username}/{password}")
   * 
   * @param type $id 
   */
  public function CreateUserAction($username, $password)
  {
    $service_url = "http://192.168.103.55/mstrzelczyk/resttest/web/users";
    $curl = curl_init($service_url);
    $curl_post_data = array(
        "username" => $username,
        "password" => $password,
    );
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $curl_post_data);
    $curl_response = curl_exec($curl);
    curl_close($curl);
    return new Response($curl_response);
  }
  
  
  /**
   * @Route("/sendfile")
   * 
   * @param type $id 
   */
  public function SendFileAction()
  {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_VERBOSE, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible;)");
    curl_setopt($ch, CURLOPT_URL, "http://192.168.103.55/mstrzelczyk/resttest/web/files");
    curl_setopt($ch, CURLOPT_POST, true);
    // same as <input type="file" name="file_box">
    //print_r($_SERVER);
    //die();
    $post = array(
        "Resource"=>"@/home/mstrzelczyk/testowy.zip",
    );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post); 
    return new Response(curl_exec($ch));
  }
}
