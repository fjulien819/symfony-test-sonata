<?php

namespace AppBundle\Controller;


use Sonata\AdminBundle\Controller\CRUDController;
use Sonata\BlockBundle\Exception\BlockNotFoundException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Annotation\Route;

class BlogPostController extends CRUDController
{
    public function testLinkAction($id)
    {

        /*
        dump($this->admin->getSubject());
        dump($this->admin);
        dump($id);
      dump('ok'); die();
*/
        $this->addFlash('sonata_flash_success', 'Test effectué avec succès');
        return new RedirectResponse($this->admin->generateUrl('list'));

        /*
        $object = $this->admin->getSubject();

        if (!$object) {
            throw new NotFoundHttpException(sprintf('unable to find the object with id: %s', $id));
        }

        // Be careful, you may need to overload the __clone method of your object
        // to set its id to null !
        $clonedObject = clone $object;

        $clonedObject->setName($object->getName().' (Clone)');

        $this->admin->create($clonedObject);

        $this->addFlash('sonata_flash_success', 'Cloned successfully');

        return new RedirectResponse($this->admin->generateUrl('list'));
    */

    }

    /*
    public function preList($request)
    {
        dump('prelist');die();
    }
    */

}
