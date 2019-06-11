<?php
	
	namespace CovoiturageBundle\Controller;
	
	use Symfony\Bundle\FrameworkBundle\Controller\Controller;
	use CovoiturageBundle\Entity\Passager;
	use Symfony\Component\HttpFoundation\Request;
	use CovoiturageBundle\Form\PassagerType;
	
	class PassagerController extends Controller
	{
		public function viewAction($id)
		{
			$passager = $this->getDoctrine()->getManager()->getRepository('CovoiturageBundle:Passager')->find($id);
			
			return $this->render('@Covoiturage/Passager/view.html.twig', array('passager' => $passager));
		}
		
		public function viewAllAction()
		{
			$em = $this->getDoctrine()->getManager();
			$passagers = $em->getRepository(Passager::class)->findAll();
			
			return $this->render('@Covoiturage/Passager/view_all.html.twig', array('passagers' => $passagers));
		}
		
		public function addAction(Request $request)
		{
			$passager = new Passager();
			$form = $this->createForm(PassagerType::class, $passager);
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($passager);
				$em->flush();
				
				return $this->redirect($this->generateUrl('passager_view', array('id' => $passager->getId())));
			}
			
			return $this->render('@Covoiturage/Passager/add.html.twig', array('form' => $form->createView()));
		}
		
		public function editAction($id, Request $request)
		{
			$em = $this->getDoctrine()->getManager();
			$passager = $em->getRepository(Passager::class)->find($id);
			$form = $this->createForm(PassagerType::class, $passager);
			$form->handleRequest($request);
			if ($form->isValid()) {
				$em = $this->getDoctrine()->getManager();
				$em->persist($passager);
				$em->flush();
				
				return $this->redirect($this->generateUrl('passager_view', array('id' => $passager->getId())));
			}
			
			return $this->render(
				'@Covoiturage/Passager/edit.html.twig',
				array('form' => $form->createView(), 'passager' => $passager)
			);
		}
		
		public function removeAction($id)
		{
			$em = $this->getDoctrine()->getManager();
			$passager = $em->getRepository(Passager::class)->find($id);
			try {
				$em->remove($passager);
				$em->flush();
				$passagers = $em->getRepository(Passager::class)->findAll();
				
				return $this->render('@Covoiturage/Passager/view_all.html.twig', array('passagers' => $passagers));
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
