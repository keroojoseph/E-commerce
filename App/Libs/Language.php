<?php

namespace App\Libs;

class Language
{
    private $dictionary = [];
    public function load($path)
    {
         $defaultLanguage = APP_DEFAULT_LANGUAGE;

         if (isset($_SESSION['lang'])) {
             $defaultLanguage = $_SESSION['lang'];
         }

         $pathArray = explode('.', $path);
         $languageFileToLoad = LANGUAGES_PATH . $defaultLanguage . DS . $pathArray[0] . DS . $pathArray[1] . ".lang.php";

         if (file_exists($languageFileToLoad)) {
             require_once $languageFileToLoad;

             if (is_array($_) && !empty($_)) {
                 foreach ($_ as $key => $value) {

                     if (!array_key_exists($key, $this->dictionary)) {
                        $this->dictionary[$key] = $value;
                     }
                 }
             }
         } else {
             trigger_error('Language file "' . $path . '" does not exists.', E_USER_ERROR);
         }
    }

    public function getDictionary(): array
    {
        return $this->dictionary;
    }
}