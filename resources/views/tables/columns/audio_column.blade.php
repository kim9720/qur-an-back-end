<div>
    @if ($getState())
        <audio controls>
            <source src="{{ Storage::url($getState()) }}" type="audio/mpeg">
            Your browser does not support the audio element.
        </audio>
    @else
        No audio available
    @endif
</div>


