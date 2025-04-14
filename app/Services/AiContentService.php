<?php

namespace App\Services;

use OpenAI;

class AiContentService
{
    protected $client;

    public function __construct()
    {
        $this->client = OpenAI::client(env('OPENAI_API_KEY'));
    }

    public function generatePostContent(string $prompt): string
    {
        $response = $this->client->chat()->create([
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant that creates engaging social media posts.'],
                ['role' => 'user', 'content' => $prompt],
            ],
        ]);

        return trim($response->choices[0]->message->content);
    }
}
