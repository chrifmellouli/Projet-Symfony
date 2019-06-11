<?php
	
	namespace CovoiturageBundle\Form;
	
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class ChauffeurType extends AbstractType
	{
		/**
		 * {@inheritdoc}
		 */
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder->add('nomch')
				->add('prenomch')
				->add('agech')
				->add('cinch')
				->add('tel')
				->add('ville')
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
					'data_class' => 'CovoiturageBundle\Entity\Chauffeur',
				)
			);
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function getBlockPrefix()
		{
			return 'covoituragebundle_chauffeur';
		}
		
		
	}
