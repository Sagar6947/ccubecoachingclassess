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
class Google_Service_Translate_InputConfig extends Google_Model
{
  protected $gcsSourceType = 'Google_Service_Translate_GcsSource';
  protected $gcsSourceDataType = '';
  public $mimeType;
  /**
   * @param Google_Service_Translate_GcsSource
   */
  public function setGcsSource(Google_Service_Translate_GcsSource $gcsSource)
  {
    $this->gcsSource = $gcsSource;
  }
  /**
   * @return Google_Service_Translate_GcsSource
   */
  public function getGcsSource()
  {
    return $this->gcsSource;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
}
