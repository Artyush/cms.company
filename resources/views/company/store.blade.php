<?php

use App\Models\Company\Company;

?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif


            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form action="{{ route('companies.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }} *</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">{{ __('Logo') }}</label>
                            <input id="logo" type="file" name="logo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="url" class="form-label">{{ __('URL') }} *</label>
                            <input type="text" name="url" class="form-control" id="url">
                        </div>

                        <select name="show_status" class="show-status">
                            <option
                                value="{{Company::STATUS_ACTIVE}}"{{$company->show_status == Company::STATUS_ACTIVE ? ' selected="selected"' : ''}}>{{ __('Active') }}</option>
                            <option
                                value="{{Company::STATUS_INACTIVE}}"{{$company->show_status == Company::STATUS_INACTIVE ? ' selected="selected"': ''}}>{{ __('Inactive') }}</option>
                        </select>
                        <div class="error" id="error-show_status"></div>

                        <div class="mt-4">
                            <button type="submit"
                                    class="mb-4 inline-flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-widest text-gray-700 shadow-sm transition duration-150 ease-in-out hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25">
                                {{ __('Save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
