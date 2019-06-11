<?php
	
	namespace CovoiturageBundle\Form;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class PassagerType extends AbstractType
	{
		/**
		 * {@inheritdoc}
		 */
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder->add('nompass')
				->add('prenompass')
				->add('telpass')
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
					'data_class' => 'CovoiturageBundle\Entity\Passager',
				)
			);
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function getBlockPrefix()
		{
			return 'covoituragebundle_passager';
		}
		
		
	}
