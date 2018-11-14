<?php

namespace Agriwin\UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Captcha\Bundle\CaptchaBundle\Validator\Constraints as CaptchaAssert;

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

  /**
   * @CaptchaAssert\ValidCaptcha(
   *      message = "CAPTCHA validation failed, try again."
   * )
   */
  protected $captchaCode;

  public function getCaptchaCode()
  {
    return $this->captchaCode;
  }

  public function setCaptchaCode($captchaCode)
  {
    $this->captchaCode = $captchaCode;
  }

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
   * @ORM\Column(name="firstname", type="string", length=30)
   */
  protected $firstname;

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

  public function getFirstname()
  {
    return $this->firstname;
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

  public function setFirstname($firstname)
  {
    $this->firstname = $firstname;

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
