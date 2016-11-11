<?php

namespace QueueBundle\Controller;

use QueueBundle\Entity\Customer\CustomerInterface;
use QueueBundle\Form\AnonymousType;
use QueueBundle\Form\CitizenType;
use QueueBundle\Form\OrganisationType;
use QueueBundle\Entity\Customer\Citizen;
use QueueBundle\Entity\Customer\Organisation;
use QueueBundle\Entity\Customer\Anonymous;
use QueueBundle\Entity\QueueEntry;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\JsonResponse;
use \DateTime;

class QueueController
    extends Controller
{

    /**
     * @Route("/")
     * @param Request $request
     * @return Response
     */
    public function indexAction(Request $request)
    {
        $entityManager = $this->container->get('doctrine.orm.entity_manager');

        $citizenForm = $this->createForm(CitizenType::class, new Citizen(), ['allow_extra_fields' => true]);
        $organisationForm = $this->createForm(OrganisationType::class, new Organisation(), ['allow_extra_fields' => true]);
        $anonymousForm = $this->createForm(AnonymousType::class, new Anonymous(), ['allow_extra_fields' => true]);
        $forms = [
            $citizenForm,
            $organisationForm,
            $anonymousForm
        ];

        /** @var Form $form */
        foreach ($forms as $form) {
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                /** @var CustomerInterface $customer */
                $customer = $form->getData();
                $queueEntry = new QueueEntry($customer, new DateTime(), $form->get('service')->getData());
                $entityManager->persist($customer);
                $entityManager->persist($queueEntry);
                $entityManager->flush();
            }
        }

        return $this->render('QueueBundle:Default:index.html.twig', [
            'forms' => [
                'citizen' => $citizenForm->createView(),
                'organisation' => $organisationForm->createView(),
                'anonymous' => $anonymousForm->createView()
            ]
        ]);
    }

    /**
     * @Route("/list")
     * @param Request $request
     * @return JsonResponse
     */
    public function listAction(Request $request)
    {
        $entryRepo = $this->container->get('queue.entry_repository');
        $entries = $entryRepo->getOldestBatch(10); //@todo: fix silent failures somehow

        $entryValues = [];
        if (!empty($entryValues)) {
            /** @var QueueEntry $entry */
            foreach ($entries as $entry) {
                $customer = $entry->getCustomer();
                $entryValues[] = [
                    'type' => $customer->getType(),
                    'name' => $customer->getDisplayName(),
                    'service' => $entry->getServiceName(),
                    'queued' => $entry->getQueuedAt()
                ];
            }
        }

        return new JsonResponse($entryValues);
    }


}
