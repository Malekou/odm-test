<?php
namespace Documents;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document
 */
class User {
  /**
   * @ODM\Id
   */
  protected $id;

  /**
   * @ODM\Int
   *
   * The Drupal user id.
   */
  protected $uid;

  /**
   * @ODM\String
   *
   * The Drupal user name, unsanitized.
   */
  protected $username;

  /**
   * @ODM\String
   */
  protected $avatar;

  /**
   * @ODM\String
   */
  protected $url_page_perso;

  /**
   * @ODM\Boolean
   */
  protected $abonne;

  /**
   * @ODM\Boolean
   */
  protected $journaliste;

  /**
   * @param $uid
   * @param $username
   */
  public function __construct($uid, $username) {
    $this->uid = $uid;
    $this->username = $username;
  }

  /**
   * @return mixed
   */
  public function getId() {
    return $this->uid;
  }

  /**
   * @param $item
   * @param $value
   */
  public function __set($item, $value) {
    $properties = get_object_vars($this);
    if (in_array($item, array_keys($properties))) {
      $this->{$item} = $value;
    }
  }

  /**
   * @param $item
   * @return mixed
   */
  public function __get($item) {
    return $this->{$item};
  }
}
