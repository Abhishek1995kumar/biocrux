<?php 

use Illuminate\Support\Facades\DB;
// status/error/api statuscode
const HTTP_CONTINUE                                                  = 100;
const HTTP_SWITCHING_PROTOCOLS                                       = 101;
const HTTP_PROCESSING                                                = 102;  
const HTTP_OK                                                        = 200;
const HTTP_CREATED                                                   = 201;
const HTTP_ACCEPTED                                                  = 202;
const HTTP_NON_AUTHORITATIVE_INFORMATION                             = 203;
const HTTP_NO_CONTENT                                                = 204;
const HTTP_RESET_CONTENT                                             = 205;
const HTTP_PARTIAL_CONTENT                                           = 206;
const HTTP_MULTI_STATUS                                              = 207;  
const HTTP_ALREADY_REPORTED                                          = 208;  
const HTTP_IM_USED                                                   = 226;  
const HTTP_MULTIPLE_CHOICES                                          = 300;
const HTTP_MOVED_PERMANENTLY                                         = 301;
const HTTP_FOUND                                                     = 302;
const HTTP_SEE_OTHER                                                 = 303;
const HTTP_NOT_MODIFIED                                              = 304;
const HTTP_USE_PROXY                                                 = 305;
const HTTP_RESERVED                                                  = 306;
const HTTP_TEMPORARY_REDIRECT                                        = 307;
const HTTP_PERMANENTLY_REDIRECT                                      = 308;  
const HTTP_BAD_REQUEST                                               = 400;
const HTTP_UNAUTHORIZED                                              = 401;
const HTTP_PAYMENT_REQUIRED                                          = 402;
const HTTP_FORBIDDEN                                                 = 403;
const HTTP_NOT_FOUND                                                 = 404;
const HTTP_METHOD_NOT_ALLOWED                                        = 405;
const HTTP_NOT_ACCEPTABLE                                            = 406;
const HTTP_PROXY_AUTHENTICATION_REQUIRED                             = 407;
const HTTP_REQUEST_TIMEOUT                                           = 408;
const HTTP_CONFLICT                                                  = 409;
const HTTP_GONE                                                      = 410;
const HTTP_LENGTH_REQUIRED                                           = 411;
const HTTP_PRECONDITION_FAILED                                       = 412;
const HTTP_REQUEST_ENTITY_TOO_LARGE                                  = 413;
const HTTP_REQUEST_URI_TOO_LONG                                      = 414;
const HTTP_UNSUPPORTED_MEDIA_TYPE                                    = 415;
const HTTP_REQUESTED_RANGE_NOT_SATISFIABLE                           = 416;
const HTTP_EXPECTATION_FAILED                                        = 417;
const HTTP_I_AM_A_TEAPOT                                             = 418;  
const HTTP_MISDIRECTED_REQUEST                                       = 421;  
const HTTP_UNPROCESSABLE_ENTITY                                      = 422; 
const HTTP_LOCKED                                                    = 423;  
const HTTP_FAILED_DEPENDENCY                                         = 424;  
const HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL = 425;  
const HTTP_UPGRADE_REQUIRED                                          = 426;  
const HTTP_PRECONDITION_REQUIRED                                     = 428;  
const HTTP_TOO_MANY_REQUESTS                                         = 429;  
const HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE                           = 431;  
const HTTP_UNAVAILABLE_FOR_LEGAL_REASONS                             = 451;
const HTTP_INTERNAL_SERVER_ERROR                                     = 500;
const HTTP_NOT_IMPLEMENTED                                           = 501;
const HTTP_BAD_GATEWAY                                               = 502;
const HTTP_SERVICE_UNAVAILABLE                                       = 503;
const HTTP_GATEWAY_TIMEOUT                                           = 504;
const HTTP_VERSION_NOT_SUPPORTED                                     = 505;
const HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL                      = 506;   
const HTTP_INSUFFICIENT_STORAGE                                      = 507;   
const HTTP_LOOP_DETECTED                                             = 508;   
const HTTP_NOT_EXTENDED                                              = 510;   
const HTTP_NETWORK_AUTHENTICATION_REQUIRED                           = 511;   
const HTTP_UNVALID_TOKEN                                             = 498;   // HTTP request but the token was not accepted by the server

const statusTexts = array(
    100 => 'Continue',
    101 => 'Switching Protocols',
    102 => 'Processing',            // RFC2518
    200 => 'OK',
    201 => 'Created',
    202 => 'Accepted',
    203 => 'Non-Authoritative Information',
    204 => 'No Content',
    205 => 'Reset Content',
    206 => 'Partial Content',
    207 => 'Multi-Status',          // RFC4918
    208 => 'Already Reported',      // RFC5842
    226 => 'IM Used',               // RFC3229
    300 => 'Multiple Choices',
    301 => 'Moved Permanently',
    302 => 'Found',
    303 => 'See Other',
    304 => 'Not Modified',
    305 => 'Use Proxy',
    307 => 'Temporary Redirect',
    308 => 'Permanent Redirect',    // RFC7238
    400 => 'Bad Request',
    401 => 'Unauthorized',
    402 => 'Payment Required',
    403 => 'Forbidden',
    404 => 'Not Found',
    405 => 'Method Not Allowed',
    406 => 'Not Acceptable',
    407 => 'Proxy Authentication Required',
    408 => 'Request Timeout',
    409 => 'Conflict',
    410 => 'Gone',
    411 => 'Length Required',
    412 => 'Precondition Failed',
    413 => 'Payload Too Large',
    414 => 'URI Too Long',
    415 => 'Unsupported Media Type',
    416 => 'Range Not Satisfiable',
    417 => 'Expectation Failed',
    418 => 'I\'m a teapot',                                               // RFC2324
    421 => 'Misdirected Request',                                         // RFC7540
    422 => 'Unprocessable Entity',                                        // RFC4918
    423 => 'Locked',                                                      // RFC4918
    424 => 'Failed Dependency',                                           // RFC4918
    425 => 'Reserved for WebDAV advanced collections expired proposal',   // RFC2817
    426 => 'Upgrade Required',                                            // RFC2817
    428 => 'Precondition Required',                                       // RFC6585
    429 => 'Too Many Requests',                                           // RFC6585
    431 => 'Request Header Fields Too Large',                             // RFC6585
    451 => 'Unavailable For Legal Reasons',                               // RFC7725
    500 => 'Internal Server Error',
    501 => 'Not Implemented',
    502 => 'Bad Gateway',
    503 => 'Service Unavailable',
    504 => 'Gateway Timeout',
    505 => 'HTTP Version Not Supported',
    506 => 'Variant Also Negotiates',                                     // RFC2295
    507 => 'Insufficient Storage',                                        // RFC4918
    508 => 'Loop Detected',                                               // RFC5842
    510 => 'Not Extended',                                                // RFC2774
    511 => 'Network Authentication Required',                             // RFC6585
);

if (!function_exists('qy')) {
    /**
     * Enable query log and/or print the last executed query.
     * 
     * Usage:
     *   queryHelper('enable'); // Enable query log
     *   queryHelper('print');  // Print last executed query
     */
    function qy($action = null) {
        if ($action === 'enable') {
            print_r(DB::enableQueryLog());
        } elseif ($action === 'print') {
            $queries = DB::getQueryLog();
            if (!empty($queries)) {
                $lastQuery = end($queries);
                // Print query with bindings replaced
                $sql = $lastQuery['query'];
                foreach ($lastQuery['bindings'] as $binding) {
                    $value = is_numeric($binding) ? $binding : "'{$binding}'";
                    $sql = preg_replace('/\?/', $value, $sql, 1);
                }
                echo "<pre>"; print_r($sql); echo "</pre>";
                echo "<pre>Time: " . $lastQuery['time'] . " ms</pre>";
            } else {
                echo "No queries logged.";
            }
        }
    }
}

