@extends('layouts.html')

@section('tittle', 'Inicio')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/home.css')
    @vite('resources/css/complements/tailwind.css')
@endsection

@section('content')
    @component('_components._partials.preload')
    @endcomponent

    @component('_components.header')
    @endcomponent
    <div class="contenido_padre">

        <div class="flex flex-col items-center justify-center w-auto min-h-screen bg-dark-900 py-10">
            <h1 class="text-lg text-gray-400 font-medium">2020-21 Season</h1>
            <div class="flex flex-col mt-6">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden sm:rounded-lg">
                            <table class="min-w-full text-sm text-gray-400">
                                <thead class="bg-gray-800 text-xs uppercase font-medium">
                                    <tr>
                                        <th></th>
                                        <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                            Club
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                            MP
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                            W
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                            D
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                            L
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                            GF
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                            GA
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                            GD
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                            Pts
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left tracking-wider">
                                            Last 5
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-gray-800">

                                    <tr class="bg-black bg-opacity-20">
                                        <td class="pl-4">
                                            1
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/udQ6ns69PctCv143h-GeYw_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Man United</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            11
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            3
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            3
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            34
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            24
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            10
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            34
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-green-600" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4">
                                            2
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/0iShHhASp5q1SL4JhtwJiw_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Liverpool</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            9
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            6
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            37
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            21
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            16
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            33
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr class="bg-black bg-opacity-20">
                                        <td class="pl-4">
                                            3
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/UDYY4FSlty6fXFBzvFfcyw_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Leicester City</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            10
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            31
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            21
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            10
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            32
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4">
                                            4
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/C3J47ea36cMBc4XPbp9aaA_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Everton</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            10
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            28
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            21
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            32
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr class="bg-black bg-opacity-20">
                                        <td class="pl-4">
                                            5
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/k3Q_mKE98Dnohrcea0JFgQ_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Tottenham</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            16
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            18
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            3
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            29
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            15
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            14
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            29
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4">
                                            6
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/z44l-a0W1v5FmgPnemV6Xw_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Man. City</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            15
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            24
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            13
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            11
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            29
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr class="bg-black bg-opacity-20">
                                        <td class="pl-4">
                                            7
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/y1V4sm2SEBiWUPRIYl5rfg_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Southampton</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            4
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            26
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            19
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            7
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            29
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4">
                                            8
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/uyNNelfnFvCEnsLrUL-j2Q_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Aston Villa</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            15
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            29
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            16
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            13
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            26
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr class="bg-black bg-opacity-20">
                                        <td class="pl-4">
                                            9
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/fhBITrIlbQxhVB6IjxUO6Q_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Chelsea</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            7
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            32
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            21
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            11
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            26
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4">
                                            10
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/bXkiyIzsbDip3x2FFcUU3A_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Westham</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            7
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            24
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            21
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            3
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            26
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr class="bg-black bg-opacity-20">
                                        <td class="pl-4">
                                            11
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/4us2nCgl6kgZc0t3hpW75Q_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Arsenal</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            7
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            20
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            19
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            1
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            23
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4">
                                            12
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/5dqfOKpjjW6EwTAx_FysKQ_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Leeds United</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            7
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            30
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            33
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            -3
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            23
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr class="bg-black bg-opacity-20">
                                        <td class="pl-4">
                                            13
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/8piQOzndGmApKYTcvyN9vA_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Crystal Palace</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            6
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            4
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            7
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            22
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            29
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            -7
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            22
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4">
                                            14
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/-WjHLbBIQO9xE2e2MW3OPQ_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Wolves</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            18
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            6
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            4
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            19
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            26
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            -7
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            22
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr class="bg-black bg-opacity-20">
                                        <td class="pl-4">
                                            15
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/96CcNNQ0AYDAbssP0V9LuQ_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Newcastle</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            4
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            18
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            27
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            -9
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            19
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4">
                                            16
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/teLLSaMXim_8BA1d93sMng_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Burnley</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            16
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            4
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            4
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            9
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            21
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            -12
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            16
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr class="bg-black bg-opacity-20">
                                        <td class="pl-4">
                                            17
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/EKIe0e-ZIphOcfQAwsuEEQ_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Brighton</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            7
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            21
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            28
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            -7
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            14
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4">
                                            18
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/Gh7_5p3n364p4vxeM8FhNg_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Fullham</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            15
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            13
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            23
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            -10
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            11
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr class="bg-black bg-opacity-20">
                                        <td class="pl-4">
                                            19
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/Im2UqFKvfm3TaM7R2RYkjw_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">West Brom</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            17
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            1
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            11
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            11
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            39
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            -28
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            8
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="pl-4">
                                            20
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <img class="w-5"
                                                src="https://ssl.gstatic.com/onebox/media/sports/logos/wF8AgQsssfy3_GLyVR3dSg_48x48.png"
                                                alt="">
                                            <span class="ml-2 font-medium">Sheffield Wednesday</span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            18
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            1
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            2
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            15
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            9
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            29
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            -20
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            5
                                        </td>
                                        <td class="flex px-6 py-4 whitespace-nowrap">
                                            <svg class="w-4 fill-current text-green-600"
                                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                                fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <svg class="w-4 fill-current text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd"
                                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zM7 9a1 1 0 000 2h6a1 1 0 100-2H7z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="relative z-10 bg-dark dark:bg-dark pt-20 pb-10 lg:pt-[120px] lg:pb-20">
            <div class="container mx-auto">
                <div class="flex flex-wrap -mx-4">
                    <div class="w-full px-4 sm:w-2/3 lg:w-3/12">
                        <div class="w-full mb-10">
                            <a href="javascript:void(0)" class="mb-6 inline-block max-w-[160px]">
                                <img src="https://cdn.tailgrids.com/2.0/image/assets/images/logo/logo.svg" alt="logo"
                                    class="max-w-full dark:hidden" />
                                <img src="https://cdn.tailgrids.com/2.0/image/assets/images/logo/logo-white.svg"
                                    alt="logo" class="max-w-full hidden dark:block" />
                            </a>
                            <p class="text-base text-body-color dark:text-dark-6 mb-7">
                                Sed ut perspiciatis undmnis is iste natus error sit amet
                                voluptatem totam rem aperiam.
                            </p>
                            <p class="flex items-center text-sm font-medium text-dark dark:text-white">
                                <span class="mr-3 text-primary">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_941_15626)">
                                            <path
                                                d="M15.1875 19.4688C14.3438 19.4688 13.375 19.25 12.3125 18.8438C10.1875 18 7.84377 16.375 5.75002 14.2813C3.65627 12.1875 2.03127 9.84377 1.18752 7.68752C0.250019 5.37502 0.343769 3.46877 1.43752 2.40627C1.46877 2.37502 1.53127 2.34377 1.56252 2.31252L4.18752 0.750025C4.84377 0.375025 5.68752 0.562525 6.12502 1.18752L7.96877 3.93753C8.40627 4.59378 8.21877 5.46877 7.59377 5.90627L6.46877 6.68752C7.28127 8.00002 9.59377 11.2188 13.2813 13.5313L13.9688 12.5313C14.5 11.7813 15.3438 11.5625 16.0313 12.0313L18.7813 13.875C19.4063 14.3125 19.5938 15.1563 19.2188 15.8125L17.6563 18.4375C17.625 18.5 17.5938 18.5313 17.5625 18.5625C17 19.1563 16.1875 19.4688 15.1875 19.4688ZM2.37502 3.46878C1.78127 4.12503 1.81252 5.46877 2.50002 7.18752C3.28127 9.15627 4.78127 11.3125 6.75002 13.2813C8.68752 15.2188 10.875 16.7188 12.8125 17.5C14.5 18.1875 15.8438 18.2188 16.5313 17.625L18.0313 15.0625C18.0313 15.0313 18.0313 15.0313 18.0313 15L15.2813 13.1563C15.2813 13.1563 15.2188 13.1875 15.1563 13.2813L14.4688 14.2813C14.0313 14.9063 13.1875 15.0938 12.5625 14.6875C8.62502 12.25 6.18752 8.84377 5.31252 7.46877C4.90627 6.81252 5.06252 5.96878 5.68752 5.53128L6.81252 4.75002V4.71878L4.96877 1.96877C4.96877 1.93752 4.93752 1.93752 4.90627 1.96877L2.37502 3.46878Z"
                                                fill="currentColor" />
                                            <path
                                                d="M18.3125 8.90633C17.9375 8.90633 17.6563 8.62508 17.625 8.25008C17.375 5.09383 14.7813 2.56258 11.5938 2.34383C11.2188 2.31258 10.9063 2.00008 10.9375 1.59383C10.9688 1.21883 11.2813 0.906333 11.6875 0.937583C15.5625 1.18758 18.7188 4.25008 19.0313 8.12508C19.0625 8.50008 18.7813 8.84383 18.375 8.87508C18.375 8.90633 18.3438 8.90633 18.3125 8.90633Z"
                                                fill="currentColor" />
                                            <path
                                                d="M15.2187 9.18755C14.875 9.18755 14.5625 8.93755 14.5312 8.56255C14.3437 6.87505 13.0312 5.56255 11.3437 5.3438C10.9687 5.31255 10.6875 4.93755 10.7187 4.56255C10.75 4.18755 11.125 3.9063 11.5 3.93755C13.8437 4.2188 15.6562 6.0313 15.9375 8.37505C15.9687 8.75005 15.7187 9.0938 15.3125 9.1563C15.25 9.18755 15.2187 9.18755 15.2187 9.18755Z"
                                                fill="currentColor" />
                                        </g>
                                        <defs>
                                            <clipPath id="clip0_941_15626">
                                                <rect width="20" height="20" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                                <span>+012 (345) 678 99</span>
                            </p>
                        </div>
                    </div>
                    <div class="w-full px-4 sm:w-1/2 lg:w-2/12">
                        <div class="w-full mb-10">
                            <h4 class="text-lg font-semibold text-dark dark:text-white mb-9">
                                Resources
                            </h4>
                            <ul class="space-y-3">
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        SaaS Development
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        Our Products
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        User Flow
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        User Strategy
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full px-4 sm:w-1/2 lg:w-2/12">
                        <div class="w-full mb-10">
                            <h4 class="text-lg font-semibold text-dark dark:text-white mb-9">
                                Company
                            </h4>
                            <ul class="space-y-3">
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        About TailGrids
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        Contact & Support
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        Success History
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        Setting & Privacy
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full px-4 sm:w-1/2 lg:w-2/12">
                        <div class="w-full mb-10">
                            <h4 class="text-lg font-semibold text-dark dark:text-white mb-9">
                                Quick Links
                            </h4>
                            <ul class="space-y-3">
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        Premium Support
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        Our Services
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        Know Our Team
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)"
                                        class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6">
                                        Download App
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="w-full px-4 sm:w-1/2 lg:w-3/12">
                        <div class="w-full mb-10">
                            <h4 class="text-lg font-semibold text-dark dark:text-white mb-9">
                                Follow Us On
                            </h4>
                            <div class="flex items-center mb-6">
                                <a href="javascript:void(0)"
                                    class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary dark:text-white hover:text-white sm:mr-4 lg:mr-3 xl:mr-4">
                                    <svg width="8" height="16" viewBox="0 0 8 16" class="fill-current">
                                        <path
                                            d="M7.43902 6.4H6.19918H5.75639V5.88387V4.28387V3.76774H6.19918H7.12906C7.3726 3.76774 7.57186 3.56129 7.57186 3.25161V0.516129C7.57186 0.232258 7.39474 0 7.12906 0H5.51285C3.76379 0 2.54609 1.44516 2.54609 3.5871V5.83226V6.34839H2.10329H0.597778C0.287819 6.34839 0 6.63226 0 7.04516V8.90323C0 9.26452 0.243539 9.6 0.597778 9.6H2.05902H2.50181V10.1161V15.3032C2.50181 15.6645 2.74535 16 3.09959 16H5.18075C5.31359 16 5.42429 15.9226 5.51285 15.8194C5.60141 15.7161 5.66783 15.5355 5.66783 15.3806V10.1419V9.62581H6.13276H7.12906C7.41688 9.62581 7.63828 9.41935 7.68256 9.10968V9.08387V9.05806L7.99252 7.27742C8.01466 7.09677 7.99252 6.89032 7.85968 6.68387C7.8154 6.55484 7.61614 6.42581 7.43902 6.4Z" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0)"
                                    class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary dark:text-white hover:text-white sm:mr-4 lg:mr-3 xl:mr-4">
                                    <svg width="16" height="12" viewBox="0 0 16 12" class="fill-current">
                                        <path
                                            d="M14.2194 2.06654L15.2 0.939335C15.4839 0.634051 15.5613 0.399217 15.5871 0.2818C14.8129 0.704501 14.0903 0.845401 13.6258 0.845401H13.4452L13.3419 0.751468C12.7226 0.258317 11.9484 0 11.1226 0C9.31613 0 7.89677 1.36204 7.89677 2.93542C7.89677 3.02935 7.89677 3.17025 7.92258 3.26419L8 3.73386L7.45806 3.71037C4.15484 3.61644 1.44516 1.03327 1.00645 0.587084C0.283871 1.76125 0.696774 2.88845 1.13548 3.59296L2.0129 4.90802L0.619355 4.20352C0.645161 5.18982 1.05806 5.96477 1.85806 6.52838L2.55484 6.99804L1.85806 7.25636C2.29677 8.45401 3.27742 8.94716 4 9.13503L4.95484 9.36986L4.05161 9.93346C2.60645 10.8728 0.8 10.8024 0 10.7319C1.62581 11.7652 3.56129 12 4.90323 12C5.90968 12 6.65806 11.9061 6.83871 11.8356C14.0645 10.2857 14.4 4.41487 14.4 3.2407V3.07632L14.5548 2.98239C15.4323 2.23092 15.7935 1.8317 16 1.59687C15.9226 1.62035 15.8194 1.66732 15.7161 1.6908L14.2194 2.06654Z" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0)"
                                    class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary dark:text-white hover:text-white sm:mr-4 lg:mr-3 xl:mr-4">
                                    <svg width="16" height="12" viewBox="0 0 16 12" class="fill-current">
                                        <path
                                            d="M15.6645 1.88018C15.4839 1.13364 14.9419 0.552995 14.2452 0.359447C13.0065 6.59222e-08 8 0 8 0C8 0 2.99355 6.59222e-08 1.75484 0.359447C1.05806 0.552995 0.516129 1.13364 0.335484 1.88018C0 3.23502 0 6 0 6C0 6 0 8.79263 0.335484 10.1198C0.516129 10.8664 1.05806 11.447 1.75484 11.6406C2.99355 12 8 12 8 12C8 12 13.0065 12 14.2452 11.6406C14.9419 11.447 15.4839 10.8664 15.6645 10.1198C16 8.79263 16 6 16 6C16 6 16 3.23502 15.6645 1.88018ZM6.4 8.57143V3.42857L10.5548 6L6.4 8.57143Z" />
                                    </svg>
                                </a>
                                <a href="javascript:void(0)"
                                    class="flex items-center justify-center w-8 h-8 mr-3 border rounded-full text-dark hover:border-primary hover:bg-primary border-stroke dark:border-dark-3 dark:hover:border-primary dark:text-white hover:text-white sm:mr-4 lg:mr-3 xl:mr-4">
                                    <svg width="14" height="14" viewBox="0 0 14 14" class="fill-current">
                                        <path
                                            d="M13.0214 0H1.02084C0.453707 0 0 0.451613 0 1.01613V12.9839C0 13.5258 0.453707 14 1.02084 14H12.976C13.5432 14 13.9969 13.5484 13.9969 12.9839V0.993548C14.0422 0.451613 13.5885 0 13.0214 0ZM4.15142 11.9H2.08705V5.23871H4.15142V11.9ZM3.10789 4.3129C2.42733 4.3129 1.90557 3.77097 1.90557 3.11613C1.90557 2.46129 2.45002 1.91935 3.10789 1.91935C3.76577 1.91935 4.31022 2.46129 4.31022 3.11613C4.31022 3.77097 3.81114 4.3129 3.10789 4.3129ZM11.9779 11.9H9.9135V8.67097C9.9135 7.90323 9.89082 6.8871 8.82461 6.8871C7.73571 6.8871 7.57691 7.74516 7.57691 8.60323V11.9H5.51254V5.23871H7.53154V6.16452H7.55423C7.84914 5.62258 8.50701 5.08065 9.52785 5.08065C11.6376 5.08065 12.0232 6.43548 12.0232 8.2871V11.9H11.9779Z" />
                                    </svg>
                                </a>
                            </div>
                            <p class="text-base text-body-color dark:text-dark-6">
                                &copy; 2025 TailGrids
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <span class="absolute left-0 bottom-0 z-[-1]">
                    <svg width="217" height="229" viewBox="0 0 217 229" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M-64 140.5C-64 62.904 -1.096 1.90666e-05 76.5 1.22829e-05C154.096 5.49924e-06 217 62.904 217 140.5C217 218.096 154.096 281 76.5 281C-1.09598 281 -64 218.096 -64 140.5Z"
                            fill="url(#paint0_linear_1179_5)" />
                        <defs>
                            <linearGradient id="paint0_linear_1179_5" x1="76.5" y1="281" x2="76.5"
                                y2="1.22829e-05" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#3056D3" stop-opacity="0.08" />
                                <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
                <span class="absolute top-10 right-10 z-[-1]">
                    <svg width="75" height="75" viewBox="0 0 75 75" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M37.5 -1.63918e-06C58.2107 -2.54447e-06 75 16.7893 75 37.5C75 58.2107 58.2107 75 37.5 75C16.7893 75 -7.33885e-07 58.2107 -1.63918e-06 37.5C-2.54447e-06 16.7893 16.7893 -7.33885e-07 37.5 -1.63918e-06Z"
                            fill="url(#paint0_linear_1179_4)" />
                        <defs>
                            <linearGradient id="paint0_linear_1179_4" x1="-1.63917e-06" y1="37.5"
                                x2="75" y2="37.5" gradientUnits="userSpaceOnUse">
                                <stop stop-color="#13C296" stop-opacity="0.31" />
                                <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                            </linearGradient>
                        </defs>
                    </svg>
                </span>
            </div>
        </footer>
    </div>
@endsection
