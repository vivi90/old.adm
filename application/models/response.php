<?php
namespace SlsrAdm\Models {
    /**
     * Response class.
     *
     * @author Vivien Richter <vivien@slsr.org>
     */
    class Response {
        /**
         * @var int HTTP status code.
         */
        protected $code = 0;

        /**
         * @var string Content.
         */
        protected $content = "";

        /**
         * @var array Array of additional headers.
         */
        protected $additionalHeaders = [];

        /**
         * Class constructor.
         *
         * @param int $code HTTP status code.
         * @param string $content Response body content.
         * @param array $additionalHeaders Additional headers.
         */
        public function __construct(int $code, string $content, array $additionalHeaders = []) {
            $this->code = $code;
            $this->content = $content;
            $this->additionalHeaders = $additionalHeaders;
        }

        /**
         * Deliver the response to the client.
         */
        public function show() {
            header("HTTP/1.1 ".$this->code.' '.$this->getStatusMessage($this->code));
            foreach ($this->additionalHeaders as $header) {
                header($header);
            }
            echo $this->content;
        }

        /**
         * Get HTTP status message by code.
         *
         * @param int $code HTTP status code.
         * @return string HTTP status message.
         */
        protected function getStatusMessage($code) {
            switch ($code) {
                case 100:
                    return 'Continue';
                    break;

                case 101:
                    return 'Switching Protocols';
                    break;

                case 200:
                    return 'OK';
                    break;

                case 201:
                    return 'Created';
                    break;

                case 202:
                    return 'Accepted';
                    break;

                case 203:
                    return 'Non-Authoritative Information';
                    break;

                case 204:
                    return 'No Content';
                    break;

                case 205:
                    return 'Reset Content';
                    break;

                case 206:
                    return 'Partial Content';
                    break;

                case 300:
                    return 'Multiple Choices';
                    break;

                case 301:
                    return 'Moved Permanently';
                    break;

                case 302:
                    return 'Found';
                    break;

                case 303:
                    return 'See Other';
                    break;

                case 304:
                    return 'Not Modified';
                    break;

                case 305:
                    return 'Use Proxy';
                    break;

                case 306:
                    return 'Unused';
                    break;

                case 307:
                    return 'Temporary Redirect';
                    break;

                case 400:
                    return 'Bad Request';
                    break;

                case 401:
                    return 'Unauthorized';
                    break;

                case 402:
                    return 'Payment Required';
                    break;

                case 403:
                    return 'Forbidden';
                    break;

                case 404:
                    return 'Not Found';
                    break;

                case 405:
                    return 'Method Not Allowed';
                    break;

                case 406:
                    return 'Not Acceptable';
                    break;

                case 407:
                    return 'Proxy Authentication Required';
                    break;

                case 408:
                    return 'Request Timeout';
                    break;

                case 409:
                    return 'Conflict';
                    break;

                case 410:
                    return 'Gone';
                    break;

                case 411:
                    return 'Length Required';
                    break;

                case 412:
                    return 'Precondition Failed';
                    break;

                case 413:
                    return 'Request Entity Too Large';
                    break;

                case 414:
                    return 'Request-URI Too Long';
                    break;

                case 415:
                    return 'Unsupported Media Type';
                    break;

                case 416:
                    return 'Requested Range Not Satisfiable';
                    break;

                case 417:
                    return 'Expectation Failed';
                    break;

                case 500:
                    return 'Internal Server Error';
                    break;

                case 501:
                    return 'Not Implemented';
                    break;

                case 502:
                    return 'Bad Gateway';
                    break;

                case 503:
                    return 'Service Unavailable';
                    break;

                case 504:
                    return 'Gateway Timeout';
                    break;

                case 505:
                    return 'HTTP Version Not Supported';
                    break;

                default:
                    return '';
                    break;
            }
        }
    }
}
