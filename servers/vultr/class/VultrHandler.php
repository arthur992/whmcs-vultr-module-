<?php

class VultrHandler {
    private $apiKey = '你的Vultr API Key'; // 替换成你的真实 API Key
    private $baseUrl = 'https://api.vultr.com/v2';

    private function call($endpoint) {
        $ch = curl_init($this->baseUrl . $endpoint);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: Bearer {$this->apiKey}"
        ]);
        $response = curl_exec($ch);
        curl_close($ch);
        return json_decode($response, true);
    }

    public function getRegions() {
        $data = $this->call('/regions');
        return array_map(function ($r) {
            return ['id' => $r['id'], 'name' => $r['city']];
        }, $data['regions'] ?? []);
    }

    public function getPlans() {
        $data = $this->call('/plans');
        return array_map(function ($p) {
            return ['id' => $p['id'], 'name' => $p['description']];
        }, $data['plans'] ?? []);
    }

    public function getApplications() {
        $data = $this->call('/applications');
        return array_map(function ($a) {
            return ['id' => $a['id'], 'name' => $a['name']];
        }, $data['applications'] ?? []);
    }
}
