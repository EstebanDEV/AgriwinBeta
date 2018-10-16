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

  /**
   * @ORM\Column(name="mobile", type="string", length=20, nullable=true)
   */
  protected $mobile;

  /**
   * @ORM\Column(name="pays", type="string", length=30)
   */
  protected $pays;

  /**
   * @ORM\Column(name="ville", type="string", length=50)
   */
  protected $ville;

  /**
   * @ORM\Column(name="postal", type="string", length=30, nullable=true)
   */
  protected $postal;

  /**
   * @ORM\Column(name="adresse", type="string", length=200, nullable=true)
   */
  protected $adresse;

  public function getName()
  {
    return $this->name;
  }

  public function getSurname()
  {
    return $this->surname;
  }

  public function getMobile()
  {
    return $this->mobile;
  }

  public function getPays()
  {
    return $this->pays;
  }

  public function getVille()
  {
    return $this->ville;
  }

  public function getPostal()
  {
    return $this->postal;
  }

  public function getAdresse()
  {
    return $this->adresse;
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

  public function setMobile($mobile)
  {
    $this->mobile = $mobile;

    return $this;
  }

  public function setPays($pays)
  {
    $this->pays = $pays;

    return $this;
  }

  public function setVille($ville)
  {
    $this->ville = $ville;

    return $this;
  }

  public function setPostal($postal)
  {
    $this->postal = $postal;

    return $this;
  }

  public function setAdresse($adresse)
  {
    $this->adresse = $adresse;

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
