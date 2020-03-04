<?php
/**
 * Created by PhpStorm.
 * User: Julien
 * Date: 22/02/2020
 * Time: 16:55
 */

namespace AppBundle\Block;


use Sonata\BlockBundle\Block\BlockContextInterface;
use Sonata\BlockBundle\Block\Service\AbstractBlockService;
use Symfony\Component\HttpFoundation\Response;

use Sonata\AdminBundle\Form\FormMapper;
use Sonata\BlockBundle\Model\BlockInterface;
use Sonata\BlockBundle\Block\BaseBlockService;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TestBlockService extends AbstractBlockService
{
    public function getName()
    {
        return 'test';
    }

    public function getDefaultSettings()
    {
        return array();
    }

    public function validateBlock(ErrorElement $errorElement, BlockInterface $block)
    {
    }

    public function buildEditForm(FormMapper $formMapper, BlockInterface $block)
    {
    }

    public function execute(BlockContextInterface $block, Response $response = null)
    {
        // merge settings
        $settings = array_merge($this->getDefaultSettings(), $block->getSettings());

       // $settings = $block->getSettings();


        return $this->renderResponse('block/testBlock.html.twig', array(
            'block'     => $block->getBlock(),
            'settings'  => $settings,
            'content' => 'test block personnalisé ok'
        ), $response);
    }
}