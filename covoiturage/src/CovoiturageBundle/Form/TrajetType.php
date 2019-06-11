<?php
	
	namespace CovoiturageBundle\Form;
	use CovoiturageBundle\Entity\Voiture;
	use Symfony\Bridge\Doctrine\Form\Type\EntityType;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class TrajetType extends AbstractType
	{
		/**
		 * {@inheritdoc}
		 */
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder->add('depart')
				->add('arrivee')
				->add('datedep')
				->add('heuredep')
				->add('nbplacelibre')
				->add('voiture',EntityType::class, [
					'class' => Voiture::class,
					'choice_label' => function(Voiture $voiture) {
						return sprintf('(%d) %s', $voiture->getId(), $voiture->getModelevoit());
					}
				])
				->add('save', 'Symfony\Component\Form\Extension\Core\Type\SubmitType')
				->add('reset', 'Symfony\Component\Form\Extension\Core\Type\ResetType');		}
		
		/**
		 * {@inheritdoc}
		 */
		public function configureOptions(OptionsResolver $resolver)
		{
			$resolver->setDefaults(
				array(
					'data_class' => 'CovoiturageBundle\Entity\Trajet',
				)
			);
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function getBlockPrefix()
		{
			return 'covoituragebundle_trajet';
		}
		
		
	}
