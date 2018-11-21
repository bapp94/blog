<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Blog\BlogBundle\Entity\Users;
use Symfony\Component\HttpFoundation\Session\Session;


class DefaultController extends Controller
{
    public function indexAction()
    {
        session_start();
        var_dump($_SESSION);   
        return $this->render('BlogBlogBundle:Default:index.html.twig');
    }
     public function registerAction()
    {

        var_dump($_POST);
        if ( empty($_POST) == false ){
        
        $user = new Users();

        $user->setFirstname($_POST['FirstName']);
        $user->setLastname($_POST['LastName']);
        $user->setEmail($_POST['Email']);
        $user->setStatus('user');
        $password =$this->hashPassword($_POST['Password']);
        var_dump($password);
        $user->setPassword($password);
        $em = $this->getDoctrine()->getManager();
        
        $em->persist($user);

        $em->flush();

        return $this->redirectToRoute('blog_blog_login');
    }else{
      
        return $this->render('BlogBlogBundle:Default:register.html.twig');

    }
        


    }
    public function loginAction()
    {
        if (empty($_POST) == false) {
            var_dump($_POST);
            $pdo = new \PDO('mysql:host=localhost;dbname=BlogMusic', 'root', 'troiswa');

            $pdo->exec('SET NAMES UTF8');

            $query = $pdo->prepare
            (
                'SELECT
                    *
                 FROM
                    Users
                 WHERE Email = ?'
            );

            $query->execute([ $_POST['email'] ]);
        
            $user = $query->fetch(\PDO::FETCH_ASSOC);
            
            var_dump($user);

        if( $this->verifyPassword($_POST['password'], $user['Password']) && $user != false ) {

            $_SESSION['user']['FirstName'] = $user['FirstName'];
            $_SESSION['user']['LastName'] = $user['LastName'];
            $_SESSION['user']['Email'] = $user['Email'];

             echo 'Connecté';
            
            var_dump($_SESSION);

        }
        }
        
        

        return $this->render('BlogBlogBundle:Default:login.html.twig');
    }
    private function hashPassword($password)
    {
       
        $salt = '$2y$11$'.substr(bin2hex(openssl_random_pseudo_bytes(32)), 0, 22);

        // Voir la documentation de crypt() : http://devdocs.io/php/function.crypt
        return crypt($password, $salt);
    }
    private function verifyPassword($password, $hashedPassword)
    {   
        // Si le mot de passe en clair est le même que la version hachée alors renvoie true.
        return crypt($password, $hashedPassword) == $hashedPassword;
    }   
}
