<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class HuggingFaceService
{
    public function generateText(string $prompt): array
    {
        $response = Http::timeout(60)->withHeaders([
            'Authorization' => 'Bearer ' . env('HF_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api-inference.huggingface.co/models/gpt2', [
            'inputs' => $prompt,
        ]);
        return $response->json();
    }
}
