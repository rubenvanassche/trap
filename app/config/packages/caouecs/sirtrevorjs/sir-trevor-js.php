<?php

return array(
    // path for image uploads, from public_path (ex: img/uploads)
    "directory_upload" => "uploads/img",

    // upload url for image
    "uploadUrl" => null,

    // url for tweet
    "tweetUrl" => null,

    // block types for Sir Trevor JS
    // by default: array('Text', 'List', 'Quote', 'Image', 'Video', 'Tweet', 'Heading')
    "blocktypes" => array(),

    // language
    // the file of translation must be in `locales` directory of your path
    "language" => "en",

    // path of Sir Trevor JS files from public_path()
    "path" => "/packages/caouecs/sirtrevorjs/0.3.2/",

    // others stylesheet files path from public_path()
    //   not files of Sir Trevor JS
    "stylesheet" => array(),

    // others javascript files path from public_path()
    //   not files of Sir Trevor JS
    //
    // because Sir Trevor JS needs Underscore.js and Eventable.js
    "script" => array(
        "/packages/caouecs/sirtrevorjs/0.3.2/underscore-min.1.4.4.js",
        "/packages/caouecs/sirtrevorjs/0.3.2/eventable.js"
    )
);