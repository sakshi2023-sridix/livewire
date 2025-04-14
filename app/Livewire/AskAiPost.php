<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\HuggingFaceService;
class AskAiPost extends Component
{
    public string $response = '';
    public string $prompt = '';

    public function getAIResponse(): void
    {
        try {
            $service = new HuggingFaceService();
            $result = $service->generateText($this->prompt);

            if (isset($result[0]['generated_text'])) {
                $this->response = $result[0]['generated_text'];
            } else {
                $this->response = '⚠️ No valid response: ' . json_encode($result);
            }
        } catch (\Exception $e) {
            $this->response = '❌ Error: ' . $e->getMessage();
        }
    }

    public function render()
    {
        return view('livewire.ask-ai-post');
    }
}
