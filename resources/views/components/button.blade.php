@if($type == "button")
    <button {{ $attributes->merge(["class" => "text-white py-3 px-6 text-base font-normal tracking-wide rounded-full inline-block text-center"]) }}>
        {{$slot}}
    </button>
@else
    <a {{ $attributes->merge(["class" => "text-white py-3 px-6 text-base font-normal tracking-wide rounded-full inline-block text-center"]) }}>
        {{$slot}}
    </a>
@endif