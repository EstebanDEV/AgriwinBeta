<?php if (!class_exists('CaptchaConfiguration')) { return; }

return [
  'RegisterCaptcha' => [
    'UserInputID' => 'captchaCode',
    'CodeLength' => CaptchaRandomization::GetRandomCodeLength(4, 7),
    'CodeStyle' => CodeStyle::Alpha,
  ],

];