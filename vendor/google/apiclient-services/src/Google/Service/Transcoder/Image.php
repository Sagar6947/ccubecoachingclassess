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
class Google_Service_Transcoder_Image extends Google_Model
{
  public $alpha;
  protected $resolutionType = 'Google_Service_Transcoder_NormalizedCoordinate';
  protected $resolutionDataType = '';
  public $uri;
  public function setAlpha($alpha)
  {
    $this->alpha = $alpha;
  }
  public function getAlpha()
  {
    return $this->alpha;
  }
  /**
   * @param Google_Service_Transcoder_NormalizedCoordinate
   */
  public function setResolution(Google_Service_Transcoder_NormalizedCoordinate $resolution)
  {
    $this->resolution = $resolution;
  }
  /**
   * @return Google_Service_Transcoder_NormalizedCoordinate
   */
  public function getResolution()
  {
    return $this->resolution;
  }
  public function setUri($uri)
  {
    $this->uri = $uri;
  }
  public function getUri()
  {
    return $this->uri;
  }
}
