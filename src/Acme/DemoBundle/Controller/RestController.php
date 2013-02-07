<?php

namespace Acme\DemoBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;

class RestController extends FOSRestController
{
    public function getUsersAction()
    {
      $view = View::create()
        ->setStatusCode(200)
        ->setData('users!');
      return $this->get('fos_rest.view_handler')->handle($view);
    } // "get_users"     [GET] /users

    public function newUsersAction()
    {} // "new_users"     [GET] /users/new

    public function postUsersAction(Request $request)
    {
      if ('POST' === $request->getMethod()) {
        $username = $request->request->get('username');
        $password = $request->request->get('password');
        $view = View::create()
          ->setStatusCode(200)
          ->setData("username: {$username}   password: {$password}");
        return $this->get('fos_rest.view_handler')->handle($view);
      } else {
        return new Response ('nie mam posta');
      }
    } // "post_users"    [POST] /users

    public function getUserAction($slug)
    {
      $view = View::create()
        ->setStatusCode(200)
        ->setData("user {$slug}");
      return $this->get('fos_rest.view_handler')->handle($view);
    } // "get_user"      [GET] /users/{slug}
    
    
    public function postFilesAction(Request $request)
    {
      if ('POST' === $request->getMethod()) {;
        $view = View::create()
          ->setStatusCode(200)
          ->setData($_FILES);
        // trzeba zanim bedzie handle przekopiowac gdzies uploadniety plik bo potem znika
        // copy($_FILES['Resource']['tmp_name'], '/tmp/target.zip');
        return $this->get('fos_rest.view_handler')->handle($view);
      } else {
        return new Response ('nie mam posta');
      }
    } // "post_files"    [POST] /files
}
