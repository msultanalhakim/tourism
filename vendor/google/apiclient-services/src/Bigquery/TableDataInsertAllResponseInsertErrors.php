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

namespace Google\Service\Bigquery;

class TableDataInsertAllResponseInsertErrors extends \Google\Collection
{
  protected $collection_key = 'errors';
  /**
   * @var ErrorProto[]
   */
  public $errors;
  protected $errorsType = ErrorProto::class;
  protected $errorsDataType = 'array';
  /**
   * @var string
   */
  public $index;

  /**
   * @param ErrorProto[]
   */
  public function setErrors($errors)
  {
    $this->errors = $errors;
  }
  /**
   * @return ErrorProto[]
   */
  public function getErrors()
  {
    return $this->errors;
  }
  /**
   * @param string
   */
  public function setIndex($index)
  {
    $this->index = $index;
  }
  /**
   * @return string
   */
  public function getIndex()
  {
    return $this->index;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(TableDataInsertAllResponseInsertErrors::class, 'Google_Service_Bigquery_TableDataInsertAllResponseInsertErrors');
