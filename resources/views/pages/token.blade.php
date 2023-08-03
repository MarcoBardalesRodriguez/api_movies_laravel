@extends('layout')

@section('title', 'New Tokens')

@section('content')
    <div class="container d-flex flex-column justify-content-center align-items-center">
        <h2 class="display-4">Token</h2>
        <div class="container shadow border-secondary rounded text-center position-relative" style="min-height:80px">
            <div id="select_txt" class="pt-4">{{ $token }}</div>
            <button 
            type="button" 
            onclick="copy_data(select_txt)" 
            class="btn btn-outline-light shadow"
            style="position:absolute; top:15px; right:15px;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" width="16" height="16"><path d="M0 6.75C0 5.784.784 5 1.75 5h1.5a.75.75 0 0 1 0 1.5h-1.5a.25.25 0 0 0-.25.25v7.5c0 .138.112.25.25.25h7.5a.25.25 0 0 0 .25-.25v-1.5a.75.75 0 0 1 1.5 0v1.5A1.75 1.75 0 0 1 9.25 16h-7.5A1.75 1.75 0 0 1 0 14.25Z"></path><path d="M5 1.75C5 .784 5.784 0 6.75 0h7.5C15.216 0 16 .784 16 1.75v7.5A1.75 1.75 0 0 1 14.25 11h-7.5A1.75 1.75 0 0 1 5 9.25Zm1.75-.25a.25.25 0 0 0-.25.25v7.5c0 .138.112.25.25.25h7.5a.25.25 0 0 0 .25-.25v-7.5a.25.25 0 0 0-.25-.25Z"></path></svg>
            </button>
        </div>
        <a class="my-4" href="{{route('tokens.index')}}">back</a>
        <div class="alert alert-success d-none" role="alert" id="message"></div>
        
    </div>
    <script>
        function copy_data(containerid) {
            var range = document.createRange();
            range.selectNode(containerid); //changed here
            window.getSelection().removeAllRanges(); 
            window.getSelection().addRange(range); 
            document.execCommand("copy");
            window.getSelection().removeAllRanges();

            // Mostrar el mensaje de copiado
            var messageElement = document.getElementById("message");
            messageElement.textContent = "Text copied to clipboard";
            messageElement.classList.remove('d-none');

            // Ocultar el mensaje después de 2 segundos
            setTimeout(function () {
                messageElement.classList.add('d-none');
            }, 2000);
        }
    </script>
@endsection