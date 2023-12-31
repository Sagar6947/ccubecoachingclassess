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
class Google_Service_TrafficDirectorService_StringMatcher extends Google_Model
{
  public $exact;
  public $ignoreCase;
  public $prefix;
  public $regex;
  protected $safeRegexType = 'Google_Service_TrafficDirectorService_RegexMatcher';
  protected $safeRegexDataType = '';
  public $suffix;
  public function setExact($exact)
  {
    $this->exact = $exact;
  }
  public function getExact()
  {
    return $this->exact;
  }
  public function setIgnoreCase($ignoreCase)
  {
    $this->ignoreCase = $ignoreCase;
  }
  public function getIgnoreCase()
  {
    return $this->ignoreCase;
  }
  public function setPrefix($prefix)
  {
    $this->prefix = $prefix;
  }
  public function getPrefix()
  {
    return $this->prefix;
  }
  public function setRegex($regex)
  {
    $this->regex = $regex;
  }
  public function getRegex()
  {
    return $this->regex;
  }
  /**
   * @param Google_Service_TrafficDirectorService_RegexMatcher
   */
  public function setSafeRegex(Google_Service_TrafficDirectorService_RegexMatcher $safeRegex)
  {
    $this->safeRegex = $safeRegex;
  }
  /**
   * @return Google_Service_TrafficDirectorService_RegexMatcher
   */
  public function getSafeRegex()
  {
    return $this->safeRegex;
  }
  public function setSuffix($suffix)
  {
    $this->suffix = $suffix;
  }
  public function getSuffix()
  {
    return $this->suffix;
  }
}
