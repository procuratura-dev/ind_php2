@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Create New Vote</h1>

<form action="{{ route('votes.store') }}" method="post">
    @csrf
    <div class="mb-4">
        <label class="block mb-2">Title</label>
        <input type="text" name="title" class="border p-2 w-full rounded" required>
    </div>

    <div class="mb-4">
        <label class="block mb-2">Description</label>
        <textarea name="description" class="border p-2 w-full rounded"></textarea>
    </div>

    <div class="mb-4">
        <label class="block mb-2 font-bold">Options</label>
        <div id="options-wrapper">
            <input type="text" name="options[]" placeholder="Option 1" class="border p-2 w-full rounded mb-2" required>
            <input type="text" name="options[]" placeholder="Option 2" class="border p-2 w-full rounded mb-2" required>
        </div>
        <button type="button" onclick="addOption()" class="bg-gray-500 text-white py-1 px-2 rounded">+ Add Option</button>
    </div>

    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded">Create Vote</button>
</form>

<script>
function addOption(){
    const wrapper = document.getElementById('options-wrapper');
    const input = document.createElement('input');
    input.type='text';
    input.name='options[]';
    input.placeholder='Another option';
    input.className='border p-2 w-full rounded mb-2';
    wrapper.appendChild(input);
}
</script>
@endsection
