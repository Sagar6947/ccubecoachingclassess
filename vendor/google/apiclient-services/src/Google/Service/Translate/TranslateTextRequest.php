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
class Google_Service_Translate_TranslateTextRequest extends Google_Collection
{
  protected $collection_key = 'contents';
  public $contents;
  protected $glossaryConfigType = 'Google_Service_Translate_TranslateTextGlossaryConfig';
  protected $glossaryConfigDataType = '';
  public $labels;
  public $mimeType;
  public $model;
  public $sourceLanguageCode;
  public $targetLanguageCode;
  public function setContents($contents)
  {
    $this->contents = $contents;
  }
  public function getContents()
  {
    return $this->contents;
  }
  /**
   * @param Google_Service_Translate_TranslateTextGlossaryConfig
   */
  public function setGlossaryConfig(Google_Service_Translate_TranslateTextGlossaryConfig $glossaryConfig)
  {
    $this->glossaryConfig = $glossaryConfig;
  }
  /**
   * @return Google_Service_Translate_TranslateTextGlossaryConfig
   */
  public function getGlossaryConfig()
  {
    return $this->glossaryConfig;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setMimeType($mimeType)
  {
    $this->mimeType = $mimeType;
  }
  public function getMimeType()
  {
    return $this->mimeType;
  }
  public function setModel($model)
  {
    $this->model = $model;
  }
  public function getModel()
  {
    return $this->model;
  }
  public function setSourceLanguageCode($sourceLanguageCode)
  {
    $this->sourceLanguageCode = $sourceLanguageCode;
  }
  public function getSourceLanguageCode()
  {
    return $this->sourceLanguageCode;
  }
  public function setTargetLanguageCode($targetLanguageCode)
  {
    $this->targetLanguageCode = $targetLanguageCode;
  }
  public function getTargetLanguageCode()
  {
    return $this->targetLanguageCode;
  }
}
