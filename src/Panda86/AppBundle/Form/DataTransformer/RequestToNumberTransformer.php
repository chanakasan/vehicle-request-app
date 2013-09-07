<?php

namespace Panda86\AppBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Doctrine\Common\Persistence\ObjectManager;
use Panda86\AppBundle\Entity\Request;

class RequestToNumberTransformer implements DataTransformerInterface
{
    /**
     * @var ObjectManager
     */
    private $om;

    /**
     * @param ObjectManager $om
     */
    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    /**
     * Transforms an object (request) to a string (number).
     *
     * @param  request|null $request
     * @return string
     */
    public function transform($request)
    {
        if (null === $request) {
            return "";
        }

        return $request->getId();
    }

    /**
     * Transforms a string (number) to an object (request).
     *
     * @param  string $number
     *
     * @return request|null
     *
     * @throws TransformationFailedException if object (request) is not found.
     */
    public function reverseTransform($number)
    {
        if (!$number) {
            return null;
        }

        $request = $this->om
            ->getRepository('Panda86AppBundle:Request')
            ->findOneBy(array('id' => $number))
        ;

        if (null === $request) {
            throw new TransformationFailedException(sprintf(
                'An request with id "%s" does not exist!',
                $number
            ));
        }

        return $request;
    }
}