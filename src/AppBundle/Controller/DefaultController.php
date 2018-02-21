<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Transaction;
use Doctrine\DBAL\Driver\PDOException;
use Doctrine\DBAL\Exception\DatabaseObjectExistsException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
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
            $categoryName = $transaction->getCategory()->getName()
        );
    }

}
