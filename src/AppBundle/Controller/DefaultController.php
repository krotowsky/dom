<?php

namespace AppBundle\Controller;

use AppBundle\Entity\AccountType;
use AppBundle\Entity\Transaction;
use AppBundle\Entity\TransactionType;
use AppBundle\Entity\User;
use AppBundle\Repository\AccountTypeRepository;
use Doctrine\DBAL\Driver\PDOException;
use function Sodium\version_string;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
    public function newAction(Request $request){

        $user = $this->get('security.token_storage')->getToken()->getUser();
        $transactionType = $this->getDoctrine()->getRepository(TransactionType::class)
            ->findOneBy([
                'name' => 'income'
            ]);
        $task = new Transaction();
        $task->setCreatedAt(new \DateTime('now'));
        $task->setTransactionSaldo(15.12);
        $task->setTransactionTypeId($transactionType);
        $form = $this->createFormBuilder($task)
            ->add('Name', TextType::class, array('label' => 'Tytuł'))
            ->add('Description', TextType::class,array('label' => 'Opis'))
            ->add('TransactionValue', NumberType::class,array('label' => 'Wartość'))
            ->add('AccountNumber', TextType::class,array('label' => 'Numer konta'))
            ->add('CategoryId', EntityType::class, array(
                'class' => 'AppBundle:Category',
                'label' => 'Kategoria',
                'choice_label' => 'name',
                'choice_value' => 'id'
            ))
            ->add('AccountTypeId', EntityType::class, array(
                'class' => 'AppBundle:AccountType',
                'label' => 'Konto',
                'choice_label' => 'name',
                'choice_value' => 'id'
            ))
            ->add('save', SubmitType::class, array('label' => 'Zapisz'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $task = $form->getData();
            $this->saveAction($task,$user);

            $this->addFlash(
                'notice',
                'Zapisano!'
            );

            return $this->redirectToRoute('create_income');

        }
        return $this->render('default/form.html.twig', array(
            'form' => $form->createView(),
            'current_user' => $user = $this->get('security.token_storage')->getToken()->getUser()
        ));
    }

    /**
     * @param $data
     * @param $user
     * @return bool
     */
    public function saveAction($data, $user){

        $userId = $this->getDoctrine()->getRepository(User::class)
            ->findOneBy([
                'username' => $user->getUsername()
            ]);
        $em = $this->getDoctrine()->getManager();
        $transaction = new Transaction();
        $transaction->setUserId($userId);
        $transaction->setName($data->GetName());
        $transaction->setDescription($data->getDescription());
        $transaction->setAccountNumber($data->getAccountNumber());
        $transaction->setTransactionValue($data->getTransactionValue());
        $transaction->setTransactionSaldo($data->getTransactionSaldo());
        $transaction->setCreatedAt($data->getCreatedAt());
        $transaction->setStatusId($data->getStatusId());
        $transaction->setCategoryId($data->getCategoryId());
        $transaction->setAccountTypeId($data->getAccountTypeId());
        $transaction->setTransactionTypeId($data->getTransactionTypeId());
        $em->persist($transaction);
        $em->flush();

        return true;
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
