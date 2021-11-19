<?php
	namespace App\Exceptions;
	use Exception;

	class ApiException extends Exception {
        public function __construct(string $message = '', $statusCode = null, ?int $code = 0, \Throwable $previous = null, array $headers = [])
        {
            $this->$statusCode = $statusCode;
            parent::__construct($message, $code, $previous);
        }
	}
