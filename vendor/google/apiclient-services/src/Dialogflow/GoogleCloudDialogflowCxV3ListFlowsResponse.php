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

namespace Google\Service\Dialogflow;

class GoogleCloudDialogflowCxV3ListFlowsResponse extends \Google\Collection
{
  protected $collection_key = 'flows';
  /**
   * @var GoogleCloudDialogflowCxV3Flow[]
   */
  public $flows;
  protected $flowsType = GoogleCloudDialogflowCxV3Flow::class;
  protected $flowsDataType = 'array';
  /**
   * @var string
   */
  public $nextPageToken;

  /**
   * @param GoogleCloudDialogflowCxV3Flow[]
   */
  public function setFlows($flows)
  {
    $this->flows = $flows;
  }
  /**
   * @return GoogleCloudDialogflowCxV3Flow[]
   */
  public function getFlows()
  {
    return $this->flows;
  }
  /**
   * @param string
   */
  public function setNextPageToken($nextPageToken)
  {
    $this->nextPageToken = $nextPageToken;
  }
  /**
   * @return string
   */
  public function getNextPageToken()
  {
    return $this->nextPageToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudDialogflowCxV3ListFlowsResponse::class, 'Google_Service_Dialogflow_GoogleCloudDialogflowCxV3ListFlowsResponse');
