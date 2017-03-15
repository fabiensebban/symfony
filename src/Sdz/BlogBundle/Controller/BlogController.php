<?php

// src/Sdz/BlogBundle/Controller/BlogController.php

namespace Sdz\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BlogController extends Controller
{
    //TEST
    public function testAction()
    {
        $antispam = $this->container->get('sdz_blog.antispam');

        $text = "fa.sebban@gmail.com, www.fitec.fr, hola que haces, f_garcia@fitec.fr";

        if($antispam->isSpam($text)){
            throw new \Exception('Ceci est un spam');
        }
    }

    /* /{page} */
    public function indexAction($page)
    {
        //Générer une URL
        /*
        // On fixe un id au hasard ici, il sera dynamique par la suite, évidemment
        $id = 5;

        // On veut avoir l'URL de l'article d'id $id.
        $url = $this->generateUrl('sdzblog_voir', array('id' => $id));
        // $url vaut « /blog/article/5 »

        // On redirige vers cette URL (ça ne sert à rien, on est d'accord, c'est pour l'exemple !)

        return $this->redirect($url);
        */

        //Simple render
        /*
        // On ne sait pas combien de pages il y a
        // Mais on sait qu'une page doit être supérieure ou égale à 1
        if( $page < 1 )
        {
            // On déclenche une exception NotFoundHttpException
            // Cela va afficher la page d'erreur 404 (on pourra personnaliser cette page plus tard d'ailleurs)
            throw $this->createNotFoundException('Page inexistante (page = '.$page.')');
        }

        // Ici, on récupérera la liste des articles, puis on la passera au template

        // Mais pour l'instant, on ne fait qu'appeler le template
        return $this->render('SdzBlogBundle:Blog:index.html.twig');
        */

        // Les articles :
        $articles = array(
            array(
                'titre'   => 'Mon weekend a Phi Phi Island !',
                'id'      => 1,
                'auteur'  => 'winzou',
                'contenu' => 'Ce weekend était trop bien. Blabla…',
                'date'    => new \Datetime()),
            array(
                'titre'   => 'Repetition du National Day de Singapour',
                'id'      => 2,
                'auteur' => 'winzou',
                'contenu' => 'Bientôt prêt pour le jour J. Blabla…',
                'date'    => new \Datetime()),
            array(
                'titre'   => 'Chiffre d\'affaire en hausse',
                'id'      => 3,
                'auteur' => 'M@teo21',
                'contenu' => '+500% sur 1 an, fabuleux. Blabla…',
                'date'    => new \Datetime())
        );

        //Faire apparaitre des articles sur la page d'accueil
        return $this->render('SdzBlogBundle:Blog:index.html.twig', array(
            'articles' => $articles
        ));
    }

    /* /article/{id} */
    public function voirAction($id)
    {
        //Récupération d'unevariable par les paramètres de l'URL
        /*
        // On récupère la requête
        $request = $this->getRequest();

        // On récupère notre paramètre tag
        $tag = $request->query->get('tag');

        return new Response("Affichage de l'article d'id : ".$id.", avec le tag : ".$tag);

        */

        //Génération d'une erreur 404
        /*
        // On crée la réponse sans lui donner de contenu pour le moment
        $response = new Response;

        // On définit le contenu
        $response->setContent('Ceci est une page d\'erreur 404');

        // On définit le code HTTP
        // Rappelez-vous, 404 correspond à « page introuvable »
        $response->setStatusCode(404);

        // On retourne la réponse
        return $response;
        */

        //Paramétrer le Content-Type pour envoyer autre chose que du HTML.
        /*
        // Créons nous-mêmes la réponse en JSON, grâce à la fonction json_encode()
        $response = new Response(json_encode(array('id' => $id)));

        // Ici, nous définissons le Content-type pour dire que l'on renvoie du JSON et non du HTML
        $response->headers->set('Content-Type', 'application/json');

        return $response;

        // Nous n'avons pas utilisé notre template ici, car il n'y en a pas vraiment besoin
        */

        //Envoi de mail (utilisatoin de services)
        /*
        // Récupération du service
        $mailer = $this->get('mailer');

        // Création de l'e-mail : le service mailer utilise SwiftMailer, donc nous créons une instance de Swift_Message
        // Il faut tout d'abord configurer le fichier /app/config/parameters.yml
        $message = \Swift_Message::newInstance()
            ->setSubject('Hello zéro !')
            ->setFrom('fa.sebban@gmail.com')
            ->setTo('fa.sebban@icloud.com')
            ->setBody('Coucou, voici un email avec l\'identifiant '.$id.' que vous venez de recevoir !');

        // Retour au service mailer, nous utilisons sa méthode « send() » pour envoyer notre $message
        $mailer->send($message);

        // N'oublions pas de retourner une réponse, par exemple une page qui afficherait « L'e-mail a bien été envoyé »
        return new Response('Email bien envoyé');
        */

        //Appel à une session

        //Récupération du service
        /*
        $session = $this->get('session');

        // On récupère le contenu de la variable user_id
        $user_id = $session->get('user_id');

        // On définit une nouvelle valeur pour cette variable user_id
        $session->set('user_id', 91);

        $user_id = $session->get('user_id');
        // On n'oublie pas de renvoyer une réponse
        return new Response('<html><head></head><body>user_id: ' .$user_id. '</body></html>');
        */

        //Simple render de voir.html.twig ( utiliser pour un redirect dans ajouterAction() ).
        /*
        return $this->render('SdzBlogBundle:Blog:voir.html.twig', array(
            'id'  => $id
        ));
        */

        //Render un article concret
        $article = array(
            'id'      => 1,
            'titre'   => 'Mon weekend a Phi Phi Island !',
            'auteur'  => 'winzou',
            'contenu' => 'Ce weekend était trop bien. Blabla…',
            'date'    => new \Datetime()
        );

        // Puis modifiez la ligne du render comme ceci, pour prendre en compte l'article :
        return $this->render('SdzBlogBundle:Blog:voir.html.twig', array(
            'article' => $article
        ));
    }

    /* /{annee}/{slug}.{format} */
    // On récupère tous les paramètres en arguments de la méthode
    public function voirSlugAction($slug, $annee, $format)
    {
        // Ici le contenu de la méthode
        return new Response("On pourrait afficher l'article correspondant au slug '" . $slug . "', créé en " . $annee . " et au format " . $format . ".");
    }

    /* /ajouter */
    // Ajoutez cette méthode ajouterAction :
    public function ajouterAction()
    {

        // Bien sûr, cette méthode devra réellement ajouter l'article
        // Mais faisons comme si c'était le cas
        $this->get('session')->getFlashBag()->add('info', 'Article bien enregistré');

        // Le « flashBag » est ce qui contient les messages flash dans la session
        // Il peut bien sûr contenir plusieurs messages :
        $this->get('session')->getFlashBag()->add('info', 'Oui oui, il est bien enregistré !');

        /*
        // Puis on redirige vers la page de visualisation de cet article
        return $this->redirect( $this->generateUrl('sdzblog_voir', array('id' => 5)) );
        */

        return $this->render('SdzBlogBundle:Blog:ajouter.html.twig');
    }

    /* /modifier/{id} */
    public function modifierAction($id)
    {
        // Ici, on récupérera l'article correspondant à $id

        // Ici, on s'occupera de la création et de la gestion du formulaire

        return $this->render('SdzBlogBundle:Blog:modifier.html.twig');
    }

    /* /supprimer/{id} */
    public function supprimerAction($id)
    {
        // Ici, on récupérera l'article correspondant à $id

        // Ici, on gérera la suppression de l'article en question

        return $this->render('SdzBlogBundle:Blog:supprimer.html.twig');
    }


    public function menuAction()
    {
        // On fixe en dur une liste ici, bien entendu par la suite
        // on la récupérera depuis la BDD !
        $liste = array(
            array('id' => 2, 'titre' => 'Mon dernier weekend !'),
            array('id' => 5, 'titre' => 'Sortie de Symfony2.1'),
            array('id' => 9, 'titre' => 'Petit test')
        );

        return $this->render('SdzBlogBundle:Blog:menu.html.twig', array(
            'liste_articles' => $liste // C'est ici tout l'intérêt : le contrôleur passe les variables nécessaires au template !
        ));
    }
}