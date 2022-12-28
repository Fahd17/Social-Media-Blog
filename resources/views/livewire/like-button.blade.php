<div>
    <h1>Likes: {{ $count }}</h1>
    <button wire:click="like({{ $likeableId}},'{{$likeableType}}')">Like</button>
</div>
