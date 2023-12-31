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
class Google_Service_Testing_IosModel extends Google_Collection
{
  protected $collection_key = 'tags';
  public $deviceCapabilities;
  public $formFactor;
  public $id;
  public $name;
  public $screenDensity;
  public $screenX;
  public $screenY;
  public $supportedVersionIds;
  public $tags;
  public function setDeviceCapabilities($deviceCapabilities)
  {
    $this->deviceCapabilities = $deviceCapabilities;
  }
  public function getDeviceCapabilities()
  {
    return $this->deviceCapabilities;
  }
  public function setFormFactor($formFactor)
  {
    $this->formFactor = $formFactor;
  }
  public function getFormFactor()
  {
    return $this->formFactor;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setScreenDensity($screenDensity)
  {
    $this->screenDensity = $screenDensity;
  }
  public function getScreenDensity()
  {
    return $this->screenDensity;
  }
  public function setScreenX($screenX)
  {
    $this->screenX = $screenX;
  }
  public function getScreenX()
  {
    return $this->screenX;
  }
  public function setScreenY($screenY)
  {
    $this->screenY = $screenY;
  }
  public function getScreenY()
  {
    return $this->screenY;
  }
  public function setSupportedVersionIds($supportedVersionIds)
  {
    $this->supportedVersionIds = $supportedVersionIds;
  }
  public function getSupportedVersionIds()
  {
    return $this->supportedVersionIds;
  }
  public function setTags($tags)
  {
    $this->tags = $tags;
  }
  public function getTags()
  {
    return $this->tags;
  }
}
