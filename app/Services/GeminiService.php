<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiService
{
    public function getChatCompletion($prompt)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('HF_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post('https://api-inference.huggingface.co/models/gpt2', [
            'inputs' => $prompt,
        ]);

        return $response->json();
    }
}
