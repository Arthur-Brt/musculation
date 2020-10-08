<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Mesure;
use App\Form\UserType;
use App\Form\MesureType;
use App\Entity\ArrayData;
use App\Entity\UserMesure;
use App\Entity\Utilisateur;
use App\Form\UserMesureType;
use App\Form\MesureArrayType;
use App\Form\MesureFinalType;
use App\Form\UtilisateurType;
use Twig\Extra\Intl\IntlExtension;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {
        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
        ]);
    }

    /**
     * @Route("/", name="home")
     */
    public function home(UserInterface $user = null)
    {
        if($user){
                $id = $user->getId();
                $repo = $this->getDoctrine()->getRepository(UserMesure::class);
                $datas = $repo->findByUser($id);
                $poids=array();
                // foreach($datas as $weigth){
                //    $poids = array_push($poids, $weigth->getPoids());
                //     //  return $poids;
                //  };
               
                
                return $this->render('blog/home.html.twig', [
                    'datas' => $datas,           
                ]);
        }
        else{
            return $this->render('blog/home.html.twig');
        }
        
 
    }

    /** 
    * @Route("/blog/new", name="newUser")
    */

    public function create(Request $request, EntityManagerInterface  $manager){

        $user = new Utilisateur();

        $form = $this->createFormBuilder($user)
                        ->add('nom')
                        ->add('sexe',ChoiceType::class,[
                            'choices' => [
                                'Homme' => 'Homme',
                                'Femme' => 'Femme'
                            ]
                        ])
                        ->add('taille')
                        ->add('password', PasswordType::class)
                        ->add('confirm_password', PasswordType::class)
                        ->add('birthday', BirthdayType::class)
                        ->getForm();

        $form->handleRequest($request);
        if($form->IsSubmitted() && $form->IsValid()){
            
            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('home');
        }
        // $form = $this->createForm(userType::class, $user);

        return $this->render('blog/create.html.twig',[
            'formUser' => $form->createView()
        ]);
    }
        /**
         * @Route("/blog/mesures", name="mesures")
         */

        public function mesures(Request $request, EntityManagerInterface  $manager,UserInterface $user = null){
            if(!$user){
                return $this->redirectToRoute('home');
            }
            $id = $user->getId();
            $data = new UserMesure();
            $form = $this->createForm(MesureFinalType::class, $data);

            $form->handleRequest($request);
            if($form->IsSubmitted() && $form->IsValid()){
                $data->setCreatedAt(new \DateTime());
                $data->setUser($user);
                
                
                $manager->persist($data);
                $manager->flush();

                return $this->redirectToRoute('home');
            }

            return $this->render('blog/mesures.html.twig',[
                'formMesure' => $form->createView()
            ]);
        }
    
}
