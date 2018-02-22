<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Transaction;
use Doctrine\DBAL\Driver\PDOException;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Doctrine\DBAL\Exception\DatabaseObjectExistsException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {

        $user = $this->get('security.token_storage')->getToken()->getUser();
        if (!is_object($user) || !$user instanceof UserInterface) {
            throw new AccessDeniedException(
                'This user does not have access to this section.');
        }

        // replace this example code with whatever you need
        return $this->render('default/home_section.html.twig', [
            'current_user' => $user = $this->get('security.token_storage')->getToken()->getUser(),
        ]);
    }

    /**
     * @Route("/create_income", name="create_income")
     * @param Request $request
     * @return Response
     */
    public function newAction(Request $request)
    {
        // creates a task and gives it some dummy data for this example
        $task = new Transaction();
        $task->setName('Write a blog post');
        $task->setCreatedAt(new \DateTime('now'));

        $form = $this->createFormBuilder($task)
            ->add('Name', TextType::class)
            ->add('createdAt', DateType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Task'))
            ->getForm();

        return $this->render('default/form.html.twig', array(
            'form' => $form->createView(),
            'current_user' => $user = $this->get('security.token_storage')->getToken()->getUser(),
        ));
    }

    /**
     * @Route("/add")
     */
    public function createAction(){

        $em = $this->getDoctrine()->getManager();
        try {
            $transaction = new Transaction();
            $transaction->setName('');
            $transaction->setDescription('');
            $transaction->setCreatedAt($date = new \DateTime('now'));
            $transaction->setAccountTypeId(1);
            $transaction->setCategoryId(5);
            $transaction->setTransactionTypeId(1);
            $transaction->setStatusId(1);
            $transaction->setUserId(1);
            $transaction->setTransactionValue('500.00');
            $transaction->setTransactionSaldo('1500.00');
            $transaction->setAccountNumber('5555 8888 6666 5555 1111 5555');

            $em->persist($transaction);
            $em->flush();
        }catch (PDOException $e){
            return $e;
        }

        return new Response(
            var_dump($transaction)
        );
    }

    /**
     * @Route("/show/{transactionId}")
     */

    public function showAction($transactionId)
    {
        $transaction = $this->getDoctrine()
            ->getRepository(Transaction::class)
            ->find($transactionId);

        return new Response(
            $categoryName = $transaction->getCategory()->getName(). '<bar>'.
                $categoryName =$transaction>getU
        );
    }

}
