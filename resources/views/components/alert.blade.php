@if($type == "info")
    <div {{ $attributes->merge(["class" => "px-5 py-3 w-prose rounded-md border-[1px] border-info-500 bg-info-100 text-left mt-12 text-info-800 font-medium text-sm"])}}>
        {{$slot}}
    </div>
@elseif($type == "success")
    <div {{ $attributes->merge(["class" => "px-5 py-3 w-prose rounded-md border-[1px] border-success-500 bg-success-100 text-left mt-12 text-success-800 font-medium text-sm"])}}>
        {{$slot}}
    </div>
@elseif($type == "warning")
    <div {{ $attributes->merge(["class" => "px-5 py-3 w-prose rounded-md border-[1px] border-warning-500 bg-warning-100 text-left mt-12 text-warning-800 font-medium text-sm"])}}>
        {{$slot}}
    </div>
@elseif($type == "danger")
    <div {{ $attributes->merge(["class" => "px-5 py-3 w-prose rounded-md border-[1px] border-danger-500 bg-danger-100 text-left mt-12 text-danger-800 font-medium text-sm"])}}>
        {{$slot}}
    </div>
@endif


<!-- <h3 class="font-semibold text-info-900 text-base">This is a title</h3> -->