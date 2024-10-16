<div id="modal" class="hidden fixed inset-0 z-10 overflow-auto bg-[rgba(0,0,0,0.8)]">
    <!-- modal container -->
    <div id="overlay" class="flex justify-center items-center min-h-screen p-20">
        <div class="bg-white rounded-lg w-96 max-w-[50%]">
            {{$slot}}
        </div>
    </div>
</div>

<script>
    document.querySelector("{{$openBtn}}").onclick = () => {
        document.querySelector("#modal").classList.toggle("hidden");
        document.body.classList.toggle("overflow-hidden");
    };
    document.querySelector("#overlay").onclick = (e) => {
        if (e.target == e.currentTarget) {
            document.querySelector("#modal").classList.toggle("hidden");
            document.body.classList.toggle("overflow-hidden");
        }
    };
</script>