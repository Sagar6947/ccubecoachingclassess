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
class Google_Service_TrafficDirectorService_BuildVersion extends Google_Model
{
  public $metadata;
  protected $versionType = 'Google_Service_TrafficDirectorService_SemanticVersion';
  protected $versionDataType = '';
  public function setMetadata($metadata)
  {
    $this->metadata = $metadata;
  }
  public function getMetadata()
  {
    return $this->metadata;
  }
  /**
   * @param Google_Service_TrafficDirectorService_SemanticVersion
   */
  public function setVersion(Google_Service_TrafficDirectorService_SemanticVersion $version)
  {
    $this->version = $version;
  }
  /**
   * @return Google_Service_TrafficDirectorService_SemanticVersion
   */
  public function getVersion()
  {
    return $this->version;
  }
}
