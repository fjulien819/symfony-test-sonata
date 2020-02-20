<?php

namespace AppBundle\Admin;

use AppBundle\Entity\BlogPost;
use AppBundle\Entity\Category;
use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

final class BlogPostAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        //vue form

        $formMapper
            ->tab('Post')//Onglet
                ->with('Content', ['class' => 'col-md-9'])// groupe de contenu
                    ->add('title', TextType::class)
                    ->add('body', TextareaType::class)
                    /*
                      ->add('category', EntityType::class,
                  [
                      'class' => Category::class,
                      'choice_label' => 'name',
                  ])
                    */
                ->end()// fin groupe de contenu


                ->with('Meta data', ['class' => 'col-md-3'])
                    ->add('category', ModelType::class,
                        [
                            'class' => Category::class,
                            'property' => 'name',
                        ])
                ->end()
            ->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        //vue list

        $datagridMapper->add('title')
        ->add('category', null, [], EntityType::class, [
        'class' => Category::class,
        'choice_label' => 'name',
    ]);
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        //vue list

        $listMapper->addIdentifier('title') // Champ qui contient un lien vers la page d'édition
        ->add('category.name')
        ->add('draft')
        ;
    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }
}
