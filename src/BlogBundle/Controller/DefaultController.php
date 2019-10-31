<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use BlogBundle\Entity\Albums;
use BlogBundle\Entity\Artiste;
use Symfony\Component\HttpFoundation\Session\SessionInterface;



class DefaultController extends Controller
{
    /**
     * @Route("/", name="accueil")
     */
    public function indexAction()
    {
        return $this->render('BlogBundle:Default:index.html.twig');
    }
     /**
     * @Route("/albums", name="liste_albums")
     */
    public function ListerAction(){
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Albums::class);
        $listealbum = $repo->findAll();

        return $this->render("@Blog\listealbums.html.twig",['albums'=>$listealbum]);
    }
    /**
     * @Route("/artiste", name="liste_artiste")
     */
    public function ListeartisteAction(){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Artiste::class);
        $listeartiste = $repository->findAll();

        return $this->render("@Blog\listeartiste.html.twig",['artistes'=>$listeartiste]);
    }
    /**
     * @Route("/artiste/{album}", name="album")
     */
    public function ArtistealbumAction($album){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Albums::class);
        $listealbum = $repository->findBy(['artiste'=>$album]);

        return $this->render("@Blog\albumartiste.html.twig",['album'=>$listealbum]);
    }
    /**
     * @Route("/recherche", name="recherche")
     */
    public function RechercheAction(Request $req){
        $recherche = $req->request->get('recherche');
        if($recherche  == '') {
            return $this->RedirectToRoute('liste_albums');
        }
        else
        {
            $em = $this->getDoctrine()->getManager();
            $repositoryArtiste = $this->getDoctrine()->getRepository(Artiste::class);
            $repositoryAlbum = $this->getDoctrine()->getRepository(Albums::class);
            $query1 = $repositoryArtiste->search($recherche);
            $query2 = $repositoryAlbum->search($recherche);
            $album = $query2->getResult();
            $artiste = $query1->getResult();
            return $this->render('@Blog\recherche.html.twig', ['artiste'=>$artiste, 'album' => $album] );
        }
    }
    /**
     * @Route("/genre_album/{genre}", name="genre")
     */
    public function GenreAction($genre){
        $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(Albums::class);
        $genretrouver = $repo->findBy(['genres'=>$genre]);
        return $this->render('@Blog\genre.html.twig',['objetgenre'=>$genretrouver]);
    }
    /**
     * @Route("/prix/{prix}", name="prix")
     */
    public function PrixAction($prix){
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository(Albums::class);
        $listeprix = $repository->findBy(['prix'=>$prix]);
        return $this->render('@Blog\prix.html.twig',['prix'=>$listeprix]);
    }
     /**
     * @Route("/ajouter/{id}", name="ajouter")
     */
       public function ajouterAction($id, Request $request)
    {
        $session = $request->getSession();
        if(!$session->has('panier')) 
        $session->set('panier', array());
        $panier = $session->get('panier');
    
        if(array_key_exists($id, $panier)){
            if($request->query->get('qte') != null) 
            $panier[$id] = $request->query->get('qte');
        }
        else{
            if($request->query->get('qte') != null)
            $panier[$id] = $request->query->get('qte');
            else
            $panier[$id] = 1;
        }
        $session->set('panier', $panier);
    
        return $this->redirect($this->generateUrl('panier'));
    }
    /**
     * @Route("/panier", name="panier")
     */
     public function panierAction(Request $request)
    {
        $session = $request->getSession();
        //$session->remove('panier');
        //die();
        if(!$session->has('panier')) $session->set('panier', array());
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('BlogBundle:Albums')->findArray(array_keys($session->get('panier')));
    
        return $this->render('@Blog/panier.html.twig', array('produit'=>$produits,
                                                                            'panier'=>$session->get('panier')));
    }
    /**
     * @Route("/deletepanier/{id}", name="delete")
     */
    public function supprimerAction(Request $request, $id)
{
    $session = $request->getSession();
    $panier = $session->get('panier');

    if(array_key_exists($id, $panier)){
        unset($panier[$id]);
        $session->set('panier', $panier);
    }
    return $this->redirect($this->generateUrl('panier'));
}
    /**
     * @Route("/paymant", name="payer")
     */

public function PayerAction(Request $request)
{
    $session = $request->getSession();
    $panier = $session->get('panier');
    $session->remove('panier'); 
    return $this->redirect($this->generateUrl('panier'));
}
}