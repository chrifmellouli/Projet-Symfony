<?php
	
	namespace CovoiturageBundle\Controller;
	
	use CovoiturageBundle\Entity\ReservTrajet;
	use CovoiturageBundle\Form\ReservTrajetType;
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use Symfony\Component\HttpFoundation\Request;
	
	class ReservTrajetController extends Controller
	{
		public function viewAction($id)
		{
			$reservTrajet = $this->getDoctrine()->getManager()->getRepository('CovoiturageBundle:ReservTrajet')->find(
				$id
			);
			
			return $this->render('@Covoiturage/ReservTrajet/view.html.twig', array('reservTrajet' => $reservTrajet));
		}
		
		public function viewAllAction()
		{
			$em = $this->getDoctrine()->getManager();
			$reservTrajets = $em->getRepository(ReservTrajet::class)->findAll();
			
			return $this->render(
				'@Covoiturage/ReservTrajet/view_all.html.twig',
				array('reservTrajets' => $reservTrajets)
			);
		}
		
		public function addAction(Request $request)
		{
			$reservTrajet = new ReservTrajet();
			$form = $this->createForm(ReservTrajetType::class, $reservTrajet);
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($reservTrajet);
				$em->flush();
				
				return $this->redirect($this->generateUrl('reserv_trajet_view', array('id' => $reservTrajet->getId())));
			}
			
			return $this->render('@Covoiturage/ReservTrajet/add.html.twig', array('form' => $form->createView()));
		}
		
		public function editAction($id, Request $request)
		{
			$em = $this->getDoctrine()->getManager();
			$reservTrajet = $em->getRepository(ReservTrajet::class)->find($id);
			$form = $this->createForm(ReservTrajetType::class, $reservTrajet);
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($reservTrajet);
				$em->flush();
				
				return $this->redirect($this->generateUrl('reserv_trajet_view', array('id' => $reservTrajet->getId())));
			}
			
			return $this->render(
				'@Covoiturage/ReservTrajet/edit.html.twig',
				array('form' => $form->createView(), 'reservTrajet' => $reservTrajet)
			);
		}
		
		public function removeAction($id)
		{
			$em = $this->getDoctrine()->getManager();
			$reservTrajet = $em->getRepository(ReservTrajet::class)->find($id);
			try {
				$em->remove($reservTrajet);
				$em->flush();
				$reservTrajets = $em->getRepository(ReservTrajet::class)->findAll();
				
				return $this->render(
					'@Covoiturage/ReservTrajet/view_all.html.twig',
					array('reservTrajet' => $reservTrajets)
				);
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
