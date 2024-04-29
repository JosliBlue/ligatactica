<style scoped>
    summary:hover {
        cursor: pointer;
    }

    details summary {
        font-size: 1.2rem;
        user-select: none;

    }

    details .subsummary {
        margin-top: 20px;
        padding-top: 20px;
        border-top: 1px solid #ffffff34;
        border-image-slice: 1;
        border-image-source: linear-gradient(to right, #ffffff34, transparent, transparent);
    }
</style>
@php
    $open = $open ?? false; // Establece $open en false por defecto si no se proporciona al utilizar el componente
@endphp

<details @if($open) open @endif>
    <summary>{{ $title }}</summary>
    <div class="subsummary">
        {{ $despliegue_content }}
    </div>
</details>
