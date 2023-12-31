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
class Google_Service_TrafficDirectorService_SemanticVersion extends Google_Model
{
  public $majorNumber;
  public $minorNumber;
  public $patch;
  public function setMajorNumber($majorNumber)
  {
    $this->majorNumber = $majorNumber;
  }
  public function getMajorNumber()
  {
    return $this->majorNumber;
  }
  public function setMinorNumber($minorNumber)
  {
    $this->minorNumber = $minorNumber;
  }
  public function getMinorNumber()
  {
    return $this->minorNumber;
  }
  public function setPatch($patch)
  {
    $this->patch = $patch;
  }
  public function getPatch()
  {
    return $this->patch;
  }
}
