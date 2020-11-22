<div class="flex">
    <input name="chat_id" type="text" wire:model="chat_id" hidden>
    <input class="mx-2 my-2 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" wire:model="contenido" required>
    <div class="mx-2 text-xl self-center">
        <button type="button" class="AddComment" wire:click="sendMessage"><i class="far fa-paper-plane"></i></button>
    </div>
</div>

