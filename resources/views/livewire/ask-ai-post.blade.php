<div>
    <input type="text" wire:model="prompt" class="form-control mb-3" placeholder="Type your question">
    <button wire:click="getAIResponse" class="btn btn-primary">Ask AI</button>

    @if($response)
        <div class="mt-4">
            <h5>AI's Response:</h5>
            <p>{{ $response }}</p>
        </div>
    @endif
</div>
