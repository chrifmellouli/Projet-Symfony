<?php
	
	namespace CovoiturageBundle\Controller;
	
	use CovoiturageBundle\Entity\Trajet;
	use CovoiturageBundle\Form\TrajetType;
	use Symfony\Component\HttpFoundation\Request;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	
	class TrajetController extends Controller
	{
		public function viewAction($id)
		{
			$trajet = $this->getDoctrine()->getManager()->getRepository('CovoiturageBundle:Trajet')->find($id);
			
			return $this->render('@Covoiturage/Trajet/view.html.twig', array('trajet' => $trajet));
		}
		
		public function viewAllAction()
		{
			$em = $this->getDoctrine()->getManager();
			$trajets = $em->getRepository(Trajet::class)->findAll();
			
			return $this->render('@Covoiturage/Trajet/view_all.html.twig', array('trajets' => $trajets));
		}
		
		public function addAction(Request $request)
		{
			$trajet = new Trajet();
			$form = $this->createForm(TrajetType::class, $trajet);
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($trajet);
				$em->flush();
				
				return $this->redirect($this->generateUrl('trajet_view', array('id' => $trajet->getId())));
			}
			
			return $this->render('@Covoiturage/Trajet/add.html.twig', array('form' => $form->createView()));
		}
		
		public function editAction($id, Request $request)
		{
			$em = $this->getDoctrine()->getManager();
			$trajet = $em->getRepository(Trajet::class)->find($id);
			$form = $this->createForm(TrajetType::class, $trajet);
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($trajet);
				$em->flush();
				
				return $this->redirect($this->generateUrl('trajet_view', array('id' => $trajet->getId())));
			}
			
			return $this->render(
				'@Covoiturage/Trajet/edit.html.twig',
				array('form' => $form->createView(), 'trajet' => $trajet)
			);
		}
		
		public function removeAction($id)
		{
			$em = $this->getDoctrine()->getManager();
			$trajet = $em->getRepository(Trajet::class)->find($id);
			try {
				$em->remove($trajet);
				$em->flush();
				$trajets = $em->getRepository(Trajet::class)->findAll();
				
				return $this->render('@Covoiturage/Trajet/view_all.html.twig', array('trajets', $trajets));
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
