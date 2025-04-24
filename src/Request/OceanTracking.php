<?php

namespace Ocean\Tracking\Request;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class OceanTracking
{
    /**
     * The cache key used for storing the access token.
     */
    public const CACHED_KEY = 'OCEAN-TRACK-TOKEN';

    /**
     * @var string|null The API token for requests.
     */
    protected $token;

    /**
     * @var array The current tracking data.
     */
    protected array $data = [];

    /**
     * OceanTracking constructor.
     * Retrieves token from cache or requests a new one if missing.
     */
    public function __construct()
    {
        $this->token = Cache::remember(self::CACHED_KEY, now()->addHours(2), fn() => $this->generateToken());
    }

    /**
     * Get the configured company ID.
     *
     * @return string
     */
    public function getCompanyId(): string
    {
        return config('ocean-tracking.companyid', '0000');
    }

    /**
     * Get the configured secret key.
     *
     * @return string
     */
    private function getSecret(): string
    {
        return config('ocean-tracking.secret', '38374fbc-00e3-11ee-84f6-00163e0a5d8c');
    }

    /**
     * Get the base URL for API requests from configuration.
     *
     * @return string
     */
    public function getBaseUrl(): string
    {
        return config('ocean-tracking.baseUrl', 'http://apis.my56home.com');
    }

    /**
     * Generate a new access token from the remote API and cache it.
     *
     * @return string
     * @throws \Exception if the token request fails or returns an error status
     */
    private function generateToken(): string
    {
        $data = [
            'companyid' => $this->getCompanyId(),
            'secret' => $this->getSecret(),
        ];
        $body['data'] = json_encode($data);

        $response = Http::asForm()->post($this->getBaseUrl() . "/api/v1/authorization", $body);

        if ($response->failed()) {
            throw new \Exception('Failed to retrieve token: ' . $response->body());
        }

        if ($response->json('status') !== 0) {
            throw new \Exception($response->json('message') ?? '未知错误', 1);
        }

        $token = $response->json('token');
        Cache::put(self::CACHED_KEY, $token, now()->addHours(2));

        return $token;
    }

    /**
     * Simulate tracking logic (example method).
     *
     * @param string $code
     * @return string
     */
    public function track(string $code): string
    {
        return "Tracking ocean shipment: {$code}";
    }

    /**
     * Get the cached or generated token.
     *
     * @return string
     */
    public function getToken(): string
    {
        return $this->token;
    }

    /**
     * Get the current tracking data.
     *
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * Set the tracking data and return the instance.
     *
     * @param array $data
     * @return static
     */
    public function setData(array $data): static
    {
        $this->data = $data;
        return $this;
    }
}