{{-- blade-formatter-disable --}}
<style type="text/tailwindcss">
    .btn {
        @apply px-2 py-1 text-center font-medium text-slate-700 shadow-sm ring-1 ring-slate-700/10 hover:bg-slate-50 rounded-md;
    }

    .link {
        @apply font-medium text-slate-700 underline decoration-pink-500;
    }

    .invalid-feedback {
        @apply block text-red-500 text-sm;
    }

    .is-invalid {
        @apply border-red-500 !important;
    }

    label {
        @apply block mb-2 uppercase text-slate-700;
    }

    input[type="text"], textarea {
        @apply block appearance-none w-full px-3 py-2 text-slate-700 border border-slate-300 rounded-md shadow-sm focus:ring-slate-500 focus:border-slate-500 mb-2 leading-tight;
    }
</style>
{{-- blade-formatter-enable --}}
@yield('styles')
