<?php

namespace App\Controller;

use App\Form\UserType;
use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController{

    /**
    * @Route("/inscription", name="security_registration")
    */
    
    public function registration(Request $request, EntityManagerInterface  $manager, UserPasswordEncoderInterface $encoder){
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
                    $hash = $encoder->encodePassword($user, $user->getPassword());

                    $user->setPassword($hash);

                    $manager->persist($user);
                    $manager->flush();

                    return $this->redirectToRoute('security_login');
                }

                return $this->render('security/registration.html.twig',[
                    'formUser' => $form->createView()
                ]);
    }


    /**
     *  @Route("/login", name="security_login")
     */
    public function login(){
        return $this->render('security/login.html.twig');
    }

    /**
     * @Route("/logout", name="security_logout")
     */
    public function logout(){
        
    }
 }

