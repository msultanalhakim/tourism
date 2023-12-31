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

namespace Google\Service\Appengine;

class DomainMapping extends \Google\Collection
{
  protected $collection_key = 'resourceRecords';
  /**
   * @var string
   */
  public $id;
  /**
   * @var string
   */
  public $name;
  /**
   * @var ResourceRecord[]
   */
  public $resourceRecords;
  protected $resourceRecordsType = ResourceRecord::class;
  protected $resourceRecordsDataType = 'array';
  /**
   * @var SslSettings
   */
  public $sslSettings;
  protected $sslSettingsType = SslSettings::class;
  protected $sslSettingsDataType = '';

  /**
   * @param string
   */
  public function setId($id)
  {
    $this->id = $id;
  }
  /**
   * @return string
   */
  public function getId()
  {
    return $this->id;
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
   * @param ResourceRecord[]
   */
  public function setResourceRecords($resourceRecords)
  {
    $this->resourceRecords = $resourceRecords;
  }
  /**
   * @return ResourceRecord[]
   */
  public function getResourceRecords()
  {
    return $this->resourceRecords;
  }
  /**
   * @param SslSettings
   */
  public function setSslSettings(SslSettings $sslSettings)
  {
    $this->sslSettings = $sslSettings;
  }
  /**
   * @return SslSettings
   */
  public function getSslSettings()
  {
    return $this->sslSettings;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(DomainMapping::class, 'Google_Service_Appengine_DomainMapping');
