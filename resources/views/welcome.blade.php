@extends('layouts.app')
@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Welcome page
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Hello guest
                </div>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <h2>Add event</h2>
                            </div>
                        </div>
                        <form class="save-form" name="createEvent" method="post" action="{{ route('save.event') }}">
                            <div>Point event</div>
                            <label>Chose day:
                                <input type="date" name="date" required>
                            </label>
                            <label>Start at:
                                <input type="time" name="statTime" required>
                            </label>
                            <label>Finish at:
                                <input type="time" name="finishTime" required>
                            </label>
                            <label>Title:
                                <input type="text" name="title" required>
                            </label>
                            <label>Description:
                                <textarea name="description"></textarea>
                            </label>
                            <input type="hidden" name="user_id">
                            <button class="create-btn send">save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/create.js') }}" defer></script>
@endsection
