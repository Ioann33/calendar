@extends('layouts.app')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>All events</h2>
                </div>
            </div>
            <form class="search-form" name="searchEvent" method="post" action="{{ route('save.event') }}" style="">
                <div>Search events</div>
                <label>From:
                    <input type="date" name="dateStart" required>
                </label>
                <label>To:
                    <input type="date" name="dateFinish" required>
                </label>
                <button class="create-btn send">search</button>
            </form>
        </div>
    </div>
@endsection

