<?php

namespace App\DTOs;

class CopyLeaksAuthResponse {
    private $accessToken;
    private $issuedAt;
    private $expiresAt;

    public function __construct($response) {
        $this->accessToken = $response['access_token'];
        $this->issuedAt = $response['.issued'];
        $this->expiresAt = $response['.expires'];
    }

    public function getAccessToken() {
        return $this->accessToken;
    }

    public function getIssuedAt() {
        return $this->issuedAt;
    }

    public function getExpiresAt() {
        return $this->expiresAt;
    }
}
