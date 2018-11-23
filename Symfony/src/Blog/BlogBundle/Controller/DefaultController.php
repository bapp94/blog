<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Blog\BlogBundle\Entity\Users;
use Blog\BlogBundle\Entity\Category;
use Blog\BlogBundle\Entity\Post;
use Symfony\Component\HttpFoundation\Session\Session;


class DefaultController extends Controller
{
    public function indexAction()
    {
        session_start();
        
        $repository = $this->getDoctrine()->getManager()->getRepository('BlogBlogBundle:Post');
        $listPost = $repository->findAll();
        var_dump($listPost);




        return $this->render('BlogBlogBundle:Default:index.html.twig',[ 'user' => $_SESSION , 'posts' => $listPost]);
    }
     

     public function registerAction()
    {   
        session_start();
       
        if ( empty($_POST) == false ){
        
        $user = new Users();

        $user->setFirstname($_POST['FirstName']);
        $user->setLastname($_POST['LastName']);
        $user->setEmail($_POST['Email']);
        $user->setStatus('user');
        $password =$this->hashPassword($_POST['Password']);
      
        $user->setPassword($password);
        $em = $this->getDoctrine()->getManager();
        
        $em->persist($user);

        $em->flush();

        return $this->redirectToRoute('blog_blog_login');
    }else{
      
        return $this->render('BlogBlogBundle:Default:register.html.twig', [ 'user' => $_SESSION]);

    }
        


    }
   

    public function loginAction()
    {
        session_start();
        var_dump($_SESSION);
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
            $_SESSION['user']['Id'] = $user['Id'];
            $_SESSION['user']['description'] = $user['Description'];
        }
        
        return $this->redirectToRoute('blog_blog_homepage');

        
    }
        else{
    
    
    return $this->render('BlogBlogBundle:Default:login.html.twig',[ 'user' => $_SESSION]);
}
}
    public function logoutAction(){
        session_start();

        session_destroy();



        return $this->redirectToRoute('blog_blog_homepage');
    }

    public function infoAction()
    {
        session_start();
        $em = $this->getDoctrine()->getManager();
      
        if (empty($_POST) == false) {
            $pdo = new \PDO('mysql:host=localhost;dbname=BlogMusic', 'root', 'troiswa');

            $pdo->exec('SET NAMES UTF8');

            $query = $pdo->prepare
            (   
                'UPDATE
                    Users
                SET
                    `Description`=?

                WHERE id = ?
                  '

            );  
       $query->execute([$_POST['contents'],$_SESSION['user']['Id']]);
       
   }


        return $this->render('BlogBlogBundle:Default:info.html.twig',[ 'user' => $_SESSION]);
    }

    public function adminAction(){

        session_start();

        
         return $this->render('BlogBlogBundle:Default:admin.html.twig',[ 'user' => $_SESSION]);
    }

    public function addPostAction(){

        session_start();

        $repository = $this->getDoctrine()->getManager()->getRepository('BlogBlogBundle:Category');
        $listCategory = $repository->findAll();
        var_dump($listCategory);

        if(empty($_POST) == false){

            var_dump($_POST);

            $add = new Post();
            $add ->setTitle($_POST['title']);
            $add ->setContent($_POST['contents']);
            $add ->setCategorieId($_POST['categories']);
            $add ->setAuthorId($_SESSION['user']['Id']);
            
            $em = $this->getDoctrine()->getManager();
        
            $em->persist($add);

            $em->flush();
            return $this->render('BlogBlogBundle:Default:addPost.html.twig',[ 'user' => $_SESSION , 'categories' => $listCategory]);
        }

        else{





         return $this->render('BlogBlogBundle:Default:addPost.html.twig',[ 'user' => $_SESSION , 'categories' => $listCategory]);
    }
    }

     public function showPostAction($id){

        session_start();

        $repository = $this->getDoctrine()->getManager()->getRepository('BlogBlogBundle:Post');
        
        $posts = $repository->find($id);

        dump($posts);





         return $this->render('BlogBlogBundle:Default:showPost.html.twig',[ 'user' => $_SESSION, 'post'=> $posts]);
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
