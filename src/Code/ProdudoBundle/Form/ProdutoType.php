<?php

namespace Code\ProdudoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProdutoType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text',[
              'label' => 'Produto',
              'required' => true,
              'attr'=> [
                'class'=> 'form-control'
              ]
            ])
            ->add('description','textarea', [
              'label' => 'Descrição',
              'required' => true,
              'attr' => [
                'class' => 'form-control'
              ]
            ])
            //->add('detalhe')
            //->add('categorias')
        ;
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Code\ProdudoBundle\Entity\Produto'
        ));
    } 
}
