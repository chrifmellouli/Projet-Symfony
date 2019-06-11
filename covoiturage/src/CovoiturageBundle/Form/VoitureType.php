<?php
	
	namespace CovoiturageBundle\Form;
	
	use CovoiturageBundle\Entity\Chauffeur;
	use Symfony\Bridge\Doctrine\Form\Type\EntityType;
	use Symfony\Component\Form\AbstractType;
	use Symfony\Component\Form\Extension\Core\Type\FileType;
	use Symfony\Component\Form\FormBuilderInterface;
	use Symfony\Component\OptionsResolver\OptionsResolver;
	
	class VoitureType extends AbstractType
	{
		
		/**
		 * {@inheritdoc}
		 */
		public function buildForm(FormBuilderInterface $builder, array $options)
		{
			$builder->add('modelevoit')
				->add('clim')
				->add('fumeur')
				->add('bagage')
				->add('photovoit')
				->add('chauffeur',EntityType::class, [
					'class' => Chauffeur::class,
				                'choice_label' => function(Chauffeur $chauffeur) {
                    return sprintf('(%d) %s %s', $chauffeur->getId(), $chauffeur->getNomch(), $chauffeur->getPrenomch());
                }
				])
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
					'data_class' => 'CovoiturageBundle\Entity\Voiture',
				)
			)
			;
		}
		
		/**
		 * {@inheritdoc}
		 */
		public function getBlockPrefix()
		{
			return 'covoituragebundle_voiture';
		}
		
		
	}
