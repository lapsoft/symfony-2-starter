<?php

namespace AppBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ApiaryAdmin extends Admin
{
	/**
     * Default Datagrid values
     *
     * @var array
     */
    protected $datagridValues = array(
        '_page' => 1,            // display the first page (default = 1)
        '_sort_order' => 'DESC', // reverse order (default = 'ASC')
        '_sort_by' => 'id'  // name of the ordered field
                                 // (default = the model's id field, if any)

        // the '_sort_by' key can be of the form 'mySubModel.mySubSubModel.myField'.
    );
	
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('title')
            ->add('body')
            ->add('draft')
			->add('category', null, array(), 'entity', array(
                'class'    => 'AppBundle\Entity\Category',
                'property' => 'name',
            ))
            ->add('createdBy')
            ->add('updatedBy')
            ->add('deletedBy')
            ->add('location')
            ->add('sort')
            ->add('deletedAt')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('slug')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->addIdentifier('title')
            ->add('body')
            ->add('draft', null, array('editable' => true))
            ->add('category.name')
            ->add('createdBy')
            ->add('updatedBy')
            ->add('deletedBy')
            ->add('location')
            ->add('sort')
            ->add('deletedAt')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('slug')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
			->tab('General')
				->with('Content', array('class' => 'col-md-9'))
					->add('id')
					->add('title')
					->add('body')
					->add('draft')
					->add('createdBy', null, ['help'=>'Bla bla'])
					->add('updatedBy')
					->add('deletedBy')
					->add('location')
					->add('sort')
					->add('deletedAt')
					->add('createdAt', 'date', [
							'pattern' => 'dd MMM y G',
							'locale' => 'pl',
							'timezone' => 'Europe/Berlin',
						])
					->add('updatedAt')
					->add('slug')
				->end()
				->with('Bla', array('class' => 'col-md-3'))
					->add('category', 'entity', array(
						'class' => 'AppBundle\Entity\Category',
						'property' => 'name',
					))
				->end()
            ->end()
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('title')
            ->add('body')
            ->add('draft')
            ->add('createdBy')
            ->add('updatedBy')
            ->add('deletedBy')
            ->add('location')
            ->add('sort')
            ->add('deletedAt')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('slug')
        ;
    }
}
