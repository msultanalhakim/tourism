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

namespace Google\Service\Slides;

class Line extends \Google\Model
{
  /**
   * @var string
   */
  public $lineCategory;
  /**
   * @var LineProperties
   */
  public $lineProperties;
  protected $linePropertiesType = LineProperties::class;
  protected $linePropertiesDataType = '';
  /**
   * @var string
   */
  public $lineType;

  /**
   * @param string
   */
  public function setLineCategory($lineCategory)
  {
    $this->lineCategory = $lineCategory;
  }
  /**
   * @return string
   */
  public function getLineCategory()
  {
    return $this->lineCategory;
  }
  /**
   * @param LineProperties
   */
  public function setLineProperties(LineProperties $lineProperties)
  {
    $this->lineProperties = $lineProperties;
  }
  /**
   * @return LineProperties
   */
  public function getLineProperties()
  {
    return $this->lineProperties;
  }
  /**
   * @param string
   */
  public function setLineType($lineType)
  {
    $this->lineType = $lineType;
  }
  /**
   * @return string
   */
  public function getLineType()
  {
    return $this->lineType;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Line::class, 'Google_Service_Slides_Line');
