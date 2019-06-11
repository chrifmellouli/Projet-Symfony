<?php
	
	namespace CovoiturageBundle\Controller;
	
	use CovoiturageBundle\Entity\Chauffeur;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use CovoiturageBundle\Form\ChauffeurType;
	
	class ChauffeurController extends Controller
	{
		public function viewAction($id)
		{
			$chauffeur = $this->getDoctrine()->getManager()->getRepository('CovoiturageBundle:Chauffeur')->find($id);
			
			return $this->render('@Covoiturage/Chauffeur/view.html.twig', array('chauffeur' => $chauffeur));
		}
		
		public function viewAllAction()
		{
			$em = $this->getDoctrine()->getManager();
			$chauffeurs = $em->getRepository(Chauffeur::class)->findAll();
			
			return $this->render('@Covoiturage/Chauffeur/view_all.html.twig', array('chauffeurs' => $chauffeurs));
		}
		
		public function addAction(Request $request)
		{
			$chauffeur = new Chauffeur();
			$form = $this->createForm(ChauffeurType::class, $chauffeur);
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($chauffeur);
				$em->flush();
				
				return $this->redirect($this->generateUrl('chauffeur_view', array('id' => $chauffeur->getId())));
			}
			
			return $this->render('@Covoiturage/Chauffeur/add.html.twig', array('form' => $form->createView()));
		}
		
		public function editAction($id, Request $request)
		{
			$em = $this->getDoctrine()->getManager();
			$chauffeur = $em->getRepository(Chauffeur::class)->find($id);
			$form = $this->createForm(ChauffeurType::class, $chauffeur);
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($chauffeur);
				$em->flush();
				
				return $this->redirect($this->generateUrl('chauffeur_view', array('id' => $chauffeur->getId())));
			}
			
			return $this->render(
				'@Covoiturage/Chauffeur/edit.html.twig',
				array('form' => $form->createView(), 'chauffeur' => $chauffeur)
			);
		}
		
		public function removeAction($id)
		{
			$em = $this->getDoctrine()->getManager();
			$chauffeur = $em->getRepository(Chauffeur::class)->find($id);
			try {
				$em->remove($chauffeur);
				$em->flush();
				$chauffeurs = $em->getRepository(Chauffeur::class)->findAll();
				
				return $this->render('@Covoiturage/Chauffeur/view_all.html.twig', array('chauffeurs' => $chauffeurs));
			} catch (\Exception  $e) {
				$status_code = $e->getPrevious()->getCode();
				$status_text = $e->getPrevious()->getMessage();
				
				return $this->render(
					'@Covoiturage/Default/exception.html.twig',
					array('status_text' => $status_text, 'status_code' => $status_code)
				);
			}
		}
		
	}
