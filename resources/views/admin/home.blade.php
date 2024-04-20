@extends('layouts.html')

@section('tittle', 'Home | Admin')

@section('imports')
    @vite('resources/css/complements/all.css')
    @vite('resources/css/complements/tailwind.css')
    <style>
        summary:hover {
            cursor: pointer;
        }

        details summary {
            user-select: none;
        }
    </style>
@endsection

@section('content')
    @component('_components.preload')
    @endcomponent

    @component('_components.admin_header')
    @endcomponent
    <div class="contenido_padre">
        @component('_components._partials.card')
            @slot('card_content')
                <details>
                    <summary>Título de la sección</summary>
                    <div>
                        <p>Este es el contenido que se muestra inicialmente.</p>
                        <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                    </div>
                </details>
                @component('_components._partials.floatingWindow')
                    @slot('textShow', 'XD')
                    @slot('content')
                        <details>
                            <summary>Título de la sección</summary>
                            <div>
                                <p>Este es el contenido que se muestra inicialmente.</p>
                                <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                            </div>
                        </details>
                        <details>
                            <summary>Título de la sección</summary>
                            <div>
                                <p>Este es el contenido que se muestra inicialmente.</p>
                                <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                            </div>
                        </details>
                        <details>
                            <summary>Título de la sección</summary>
                            <div>
                                <p>Este es el contenido que se muestra inicialmente.</p>
                                <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                            </div>
                        </details>
                        <details>
                            <summary>Título de la sección</summary>
                            <div>
                                <p>Este es el contenido que se muestra inicialmente.</p>
                                <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                            </div>
                        </details>
                        <details>
                            <summary>Título de la sección</summary>
                            <div>
                                <p>Este es el contenido que se muestra inicialmente.</p>
                                <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                            </div>
                        </details>
                        <details>
                            <summary>Título de la sección</summary>
                            <div>
                                <p>Este es el contenido que se muestra inicialmente.</p>
                                <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                            </div>
                        </details>

                    @endslot
                    @slot('textClose', 'Cerrarxd')
                @endcomponent
                @component('_components._partials.floatingWindow')
                    @slot('textShow', 'XssD')
                    @slot('content')
                        <details>
                            <summary>Título de la sección</summary>
                            <div>
                                <p>Este es el contenido que se muestra inicialmente.</p>
                                <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                            </div>
                        </details>
                        <details>
                            <summary>Título de la sección</summary>
                            <div>
                                <p>Este es el contenido que se muestra inicialmente.</p>
                                <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                            </div>
                        </details>
                        <details>
                            <summary>Título de la sección</summary>
                            <div>
                                <p>Este es el contenido que se muestra inicialmente.</p>
                                <p>Aquí se muestra más contenido que inicialmente está oculto.</p>
                            </div>
                        </details>


                    @endslot
                    @slot('textClose', 'Cerrarxdss')
                @endcomponent

            @endslot
        @endcomponent
        @component('_components._partials.card')
            @slot('card_content')
                <!-- component -->

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-dark shadow-md rounded-xl">
                        <thead>
                            <tr class="bg-blue-gray-100 text-white-700">
                                <th class="py-3 px-4 text-left">Stock Name</th>
                                <th class="py-3 px-4 text-left">Price</th>
                                <th class="py-3 px-4 text-left">Quantity</th>
                                <th class="py-3 px-4 text-left">Total</th>
                                <th class="py-3 px-4 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-blue-gray-900">
                            <tr class="border-b border-blue-gray-200">
                                <td class="py-3 px-4">Company A</td>
                                <td class="py-3 px-4">$50.25</td>
                                <td class="py-3 px-4">100</td>
                                <td class="py-3 px-4">$5025.00</td>
                                <td class="py-3 px-4">
                                    <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>
                                </td>
                            </tr>
                            <tr class="border-b border-blue-gray-200">
                                <td class="py-3 px-4">Company B</td>
                                <td class="py-3 px-4">$75.60</td>
                                <td class="py-3 px-4">150</td>
                                <td class="py-3 px-4">$11340.00</td>
                                <td class="py-3 px-4">
                                    <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>
                                </td>
                            </tr>
                            <tr class="border-b border-blue-gray-200">
                                <td class="py-3 px-4">Company C</td>
                                <td class="py-3 px-4">$30.80</td>
                                <td class="py-3 px-4">200</td>
                                <td class="py-3 px-4">$6160.00</td>
                                <td class="py-3 px-4">
                                    <a href="#" class="font-medium text-blue-600 hover:text-blue-800">Edit</a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>

                </div>
            @endslot
        @endcomponent
    </div>

@endsection
