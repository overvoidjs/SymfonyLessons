<?php

namespace App\Repository;

use App\Entity\Users;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Users|null find($id, $lockMode = null, $lockVersion = null)
 * @method Users|null findOneBy(array $criteria, array $orderBy = null)
 * @method Users[]    findAll()
 * @method Users[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UsersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Users::class);
    }

    //Новый пользователь
    public function new($login, $pass){

      $em = $this->getEntityManager();

      $user = new Users();
      $user->setLogin($login);
      $user->setPassword($pass);
      $user->setRole('user');

      $em->persist($user);

      $em->flush();

      return 'ok';

    }

    //update пользователь
    public function update($id ,$login, $pass){

      $em = $this->getEntityManager();

      $user = $em->getRepository(Users::class)->findOneBy(['id'=>$id]);
      $user->setLogin($login);
      $user->setPassword($pass);
      $user->setRole('user');

      $em->persist($user);

      $em->flush();

      return 'ok';

    }
}
