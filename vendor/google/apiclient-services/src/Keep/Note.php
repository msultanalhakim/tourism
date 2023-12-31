<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\Keep;

class Note extends \Google\Collection
{
  protected $collection_key = 'permissions';
  /**
   * @var Attachment[]
   */
  public $attachments;
  protected $attachmentsType = Attachment::class;
  protected $attachmentsDataType = 'array';
  /**
   * @var Section
   */
  public $body;
  protected $bodyType = Section::class;
  protected $bodyDataType = '';
  /**
   * @var string
   */
  public $createTime;
  /**
   * @var string
   */
  public $name;
  /**
   * @var Permission[]
   */
  public $permissions;
  protected $permissionsType = Permission::class;
  protected $permissionsDataType = 'array';
  /**
   * @var string
   */
  public $title;
  /**
   * @var string
   */
  public $trashTime;
  /**
   * @var bool
   */
  public $trashed;
  /**
   * @var string
   */
  public $updateTime;

  /**
   * @param Attachment[]
   */
  public function setAttachments($attachments)
  {
    $this->attachments = $attachments;
  }
  /**
   * @return Attachment[]
   */
  public function getAttachments()
  {
    return $this->attachments;
  }
  /**
   * @param Section
   */
  public function setBody(Section $body)
  {
    $this->body = $body;
  }
  /**
   * @return Section
   */
  public function getBody()
  {
    return $this->body;
  }
  /**
   * @param string
   */
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  /**
   * @return string
   */
  public function getCreateTime()
  {
    return $this->createTime;
  }
  /**
   * @param string
   */
  public function setName($name)
  {
    $this->name = $name;
  }
  /**
   * @return string
   */
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param Permission[]
   */
  public function setPermissions($permissions)
  {
    $this->permissions = $permissions;
  }
  /**
   * @return Permission[]
   */
  public function getPermissions()
  {
    return $this->permissions;
  }
  /**
   * @param string
   */
  public function setTitle($title)
  {
    $this->title = $title;
  }
  /**
   * @return string
   */
  public function getTitle()
  {
    return $this->title;
  }
  /**
   * @param string
   */
  public function setTrashTime($trashTime)
  {
    $this->trashTime = $trashTime;
  }
  /**
   * @return string
   */
  public function getTrashTime()
  {
    return $this->trashTime;
  }
  /**
   * @param bool
   */
  public function setTrashed($trashed)
  {
    $this->trashed = $trashed;
  }
  /**
   * @return bool
   */
  public function getTrashed()
  {
    return $this->trashed;
  }
  /**
   * @param string
   */
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  /**
   * @return string
   */
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Note::class, 'Google_Service_Keep_Note');
