@extends ('layouts.layout')

@section('content')
<div class="container pt-4 flex justify-center mx-auto">
    <div class="shadow-xl px-12 py-8 bg-gray-200 border border-gray-300 rounded-xl">
        <div class="col-md-8">
            <form action="" method="post" action="{{ route('contact.store') }}">

                @csrf

                <div class="mb-4 text-lg font-bold ">
                    <label>Name</label>
                    <input type="text" class="w-full p-2 border border-gray-400 {{ $errors->has('name') ? 'error' : '' }}" name="name" id="name">

                    <!-- Error -->
                    @if ($errors->has('name'))
                    <div class="text-red-500 text-xs">
                        {{ $errors->first('name') }}
                    </div>
                    @endif
                </div>

                <div class="mb-4 text-lg font-bold">
                    <label>Email</label>
                    <input type="email" class="w-full p-2 border border-gray-400 {{ $errors->has('email') ? 'error' : '' }}" name="email" id="email">

                    @if ($errors->has('email'))
                    <div class="text-red-500 text-xs">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                </div>
                <div class="mb-4 text-lg font-bold">
                    <label>Subject</label>
                    <input type="text" class="w-full p-2 border border-gray-400 {{ $errors->has('subject') ? 'error' : '' }}" name="subject"
                        id="subject">

                    @if ($errors->has('subject'))
                    <div class="text-red-500 text-xs">
                        {{ $errors->first('subject') }}
                    </div>
                    @endif
                </div>

                <div class="mb-4 text-lg font-bold">
                    <label>Message</label>
                    <textarea class="w-full p-2 border border-gray-400 {{ $errors->has('message') ? 'error' : '' }}" name="message" id="message"
                        rows="4"></textarea>

                    @if ($errors->has('message'))
                    <div class="text-red-500 text-xs">
                        {{ $errors->first('message') }}
                    </div>
                    @endif
                </div>

                <input type="submit" name="send" value="Submit" class="px-4 py-2 mr-2 text-white bg-blue-400 rounded hover:bg-blue-500">
            </form>



@endsection

