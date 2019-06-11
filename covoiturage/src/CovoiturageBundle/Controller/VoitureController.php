<?php
	
	namespace CovoiturageBundle\Controller;
	
	use CovoiturageBundle\Entity\Voiture;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	use CovoiturageBundle\Form\VoitureType;
	
	class VoitureController extends Controller
	{
		public function viewAction($id)
		{
			$voiture = $this->getDoctrine()->getManager()->getRepository('CovoiturageBundle:Voiture')->find($id);
			
			return $this->render('@Covoiturage/Voiture/view.html.twig', array('voiture' => $voiture));
		}
		
		public function viewAllAction()
		{
			$em = $this->getDoctrine()->getManager();
			$voitures = $em->getRepository(Voiture::class)->findAll();
			
			return $this->render('@Covoiturage/Voiture/view_all.html.twig', array('voitures' => $voitures));
		}
		
		public function addAction(Request $request)
		{
			$voiture = new Voiture();
			$form = $this->createForm(VoitureType::class, $voiture);
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($voiture);
				$em->flush();
				return $this->redirect($this->generateUrl('voiture_view', array('id' => $voiture->getId())));
			}
			
			return $this->render('@Covoiturage/Voiture/add.html.twig', array('form' => $form->createView()));
		}
		
		public function editAction($id, Request $request)
		{
			$em = $this->getDoctrine()->getManager();
			$voiture = $em->getRepository(Voiture::class)->find($id);
			$form = $this->createForm(VoitureType::class, $voiture);
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($voiture);
				$em->flush();
				
				return $this->redirect($this->generateUrl('voiture_view', array('id' => $voiture->getId())));
			}
			
			return $this->render(
				'@Covoiturage/Voiture/edit.html.twig',
				array('form' => $form->createView(), 'voiture' => $voiture)
			);
		}
		
		public function removeAction($id)
		{
			$em = $this->getDoctrine()->getManager();
			$voiture = $em->getRepository(Voiture::class)->find($id);
			try {
				$em->remove($voiture);
				$em->flush();
				$voitures = $em->getRepository(Voiture::class)->findAll();
				
				return $this->render('@Covoiturage/Voiture/view_all.html.twig', array('voitures' => $voitures));
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
