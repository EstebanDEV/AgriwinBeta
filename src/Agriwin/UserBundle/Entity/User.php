<?php

namespace Agriwin\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="Agriwin\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
  /**
   * @ORM\Column(name="id", type="integer")
   * @ORM\Id
   * @ORM\GeneratedValue(strategy="AUTO")
   */
  protected $id;

  public function __construct()
  {
    parent::__construct();
    // your own logic
  }
  
  public function setEmail($email)
  {
    parent::setEmail($email);
    $this->setUsername($email);
  }

  /**
   * @ORM\Column(name="name", type="string", length=30)
   */
  protected $name;

  /**
   * @ORM\Column(name="surname", type="string", length=30)
   */
  protected $surname;

  public function getName()
  {
    return $this->name;
  }

  public function getSurname()
  {
    return $this->surname;
  }

  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  public function setSurname($surname)
  {
    $this->surname = $surname;

    return $this;
  }

  public function setUsername($username)
  {
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $longueurMax = strlen($caracteres);
    $chaineAleatoire = '';
    for ($i = 0; $i < 30; $i++)
    {
      $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
    }

    $this->username = $chaineAleatoire;

    return $this;
  }
}