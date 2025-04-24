<?php

namespace Ocean\Tracking\Response;

/**
 * Class BaseResponse
 *
 * Base structure for all API response objects.
 */
abstract class BaseResponse
{
    /**
     * The full raw response body.
     *
     * @var array
     */
    protected $body;

    /**
     * The response message, if any.
     *
     * @var string|null
     */
    protected $message;

    /**
     * The parsed data payload from the response.
     *
     * @var array
     */
    protected $data;

    /**
     * Set the raw response body.
     *
     * @param array $body
     * @return void
     */
    public function setBody(array $body): void
    {
        $this->body = $body;
    }

    /**
     * Get the full raw response body.
     *
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * Format a response using the given body array.
     *
     * @param array $body
     * @return static
     */
    public static function format(array $body): static
    {
        $response = new static;
        $response->setBody($body);
        $response->validate();
        return $response;
    }

    /**
     * Set a response message.
     *
     * @param string $message
     * @return void
     */
    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    /**
     * Get the response message from the body or fallback.
     *
     * @return string
     */
    public function getMessage(): string
    {
        return $this->body['message'] ?? 'no message';
    }

    /**
     * Get the parsed response data.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Set the parsed response data.
     *
     * @param array $data
     * @return void
     */
    public function setData(array $data): void
    {
        $this->data = $data;
    }

    /**
     * Validate the response structure and contents.
     *
     * @return void
     */
    abstract public function validate(): void;
}