<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenAIService
{
    public function getChatCompletion($prompt)
    {
        // The OpenAI API endpoint for content generation
        $url = "https://api.openai.com/v1/chat/completions";

        // Send the request using Laravel's HTTP client
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type' => 'application/json',
        ])->post($url, [
            'model' => 'gpt-3.5-turbo',  // Use the free GPT-3.5 model
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ],
            'max_tokens' => 150,  // Limit to 150 tokens for a quick response
        ]);
dd($response->json());  // Debugging line to check the response
        return $response->json();  // Return the response in JSON format
    }
}
