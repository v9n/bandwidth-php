<?php

namespace Bandwidth\HttpClient;

use Guzzle\Http\Message\RequestInterface;

/**
 * RequestHandler takes care of encoding the request body into format given by options
 */
class RequestHandler {

    public static function setBody(RequestInterface $request, $body, $options)
    {
        $type = isset($options['request_type']) ? $options['request_type'] : 'form';
        $header = null;

        if ($type == 'form') {
            // Encoding body into form-urlencoded format
            return $request->addPostFields($body);
        }

        if ($type == 'raw') {
            // Raw body
            return $request->setBody($body, $header);
        }
    }

}
