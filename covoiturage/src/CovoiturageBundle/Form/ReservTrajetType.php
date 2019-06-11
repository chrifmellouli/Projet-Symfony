<?php
	
	namespace CovoiturageBundle\Form;
	
	use CovoiturageBundle\Entity\Passager;
	use CovoiturageBundle\Entity\Trajet;
	use Symfony\Bridge\Doctrine\Form\Type\EntityType;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class ReservTrajetType extends AbstractType
	{
		/**
		 * {@inheritdoc}
		 */
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder->add('dateres')
				->add(
					'trajet',
					EntityType::class,
					[
						'class' => Trajet::class,
						'choice_label' => function (Trajet $trajet) {
							return sprintf('(%d) %s %s', $trajet->getId(), $trajet->getDepart(), $trajet->getArrivee());
						},
					]
				)
				->add(
					'passager',
					EntityType::class,
					[
						'class' => Passager::class,
						'choice_label' => function (Passager $passager) {
							return sprintf(
								'(%d) %s %s',
								$passager->getId(),
								$passager->getPrenompass(),
								$passager->getNompass()
							);
						},
					]
				)
				->add('save', 'Symfony\Component\Form\Extension\Core\Type\SubmitType')
				->add('reset', 'Symfony\Component\Form\Extension\Core\Type\ResetType');
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function configureOptions(OptionsResolver $resolver)
		{
			$resolver->setDefaults(
				array(
					'data_class' => 'CovoiturageBundle\Entity\ReservTrajet',
				)
			);
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function getBlockPrefix()
		{
			return 'covoituragebundle_reservtrajet';
		}
		
		
	}
