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
class Google_Service_Transcoder_Audio extends Google_Model
{
  public $highBoost;
  public $lowBoost;
  public $lufs;
  public function setHighBoost($highBoost)
  {
    $this->highBoost = $highBoost;
  }
  public function getHighBoost()
  {
    return $this->highBoost;
  }
  public function setLowBoost($lowBoost)
  {
    $this->lowBoost = $lowBoost;
  }
  public function getLowBoost()
  {
    return $this->lowBoost;
  }
  public function setLufs($lufs)
  {
    $this->lufs = $lufs;
  }
  public function getLufs()
  {
    return $this->lufs;
  }
}
