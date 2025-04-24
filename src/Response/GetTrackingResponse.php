<?php

namespace Ocean\Tracking\Response;

/**
 * Class GetTrackingResponse
 *
 * Handles response parsing for tracking data requests.
 */
class GetTrackingResponse extends BaseResponse
{
    /**
     * Validate the response structure.
     *
     * This method is required by BaseResponse but currently not implemented.
     */
    public function validate(): void
    {
        // No validation rules defined.
    }

    /**
     * Extract and return tracking data from the response body.
     *
     * @return array
     */
    public function getData(): array
    {
        $data = [];

        foreach ($this->getBody() ?? [] as $responseData) {
            $data[] = $responseData['objlinertracking'];
        }

        return $data;
    }

    /**
     * Determine if the response contains any errors.
     *
     * @return bool
     */
    public function hasErrors(): bool
    {
        foreach ($this->getBody() ?? [] as $responseData) {
            if (($responseData['success'] ?? false) == false) {
                return true;
            }
        }

        return false;
    }

    /**
     * Retrieve all error-related messages (e.g., failed BL numbers).
     *
     * @return string
     */
    public function getErrorMessages(): string
    {
        $errorResults = [];

        foreach ($this->getBody() ?? [] as $responseData) {
            if (($responseData['success'] ?? false) == false) {
                $errorResults[] = $responseData['objlinertracking']['blno'] ?? '';
            }
        }

        return implode(',', $errorResults);
    }
}